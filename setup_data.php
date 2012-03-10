<?php

include('cd.php');
ini_set('max_execution_time', '3600');
$CurrentUser = Authentication::Authenticate();
$ModelID = Utils::SafeIntFromQS('model_id');

$Tag2AllsInDB = Tag2All::GetTag2Alls();
$TagsInDB = Tag::GetTags();


if(isset($argv) && $argc > 0)
{
	// On the commandline, use absolute path
	if(file_exists(sprintf('%1$s/setup_data.xml', dirname($_SERVER['PHP_SELF']))))
	{ $XmlFromFile = new SimpleXMLElement(file_get_contents(sprintf('%1$s/setup_data.xml', dirname($_SERVER['PHP_SELF'])))); }
}
else
{
	// During a HTTP-request, use relative path
	if(file_exists('setup_data.xml'))
	{ $XmlFromFile = new SimpleXMLElement(file_get_contents('setup_data.xml')); }
}

if($XmlFromFile)
{
	$ModelsInDb = Model::GetModels();
	$SetsInDb = Set::GetSets();
	$DatesInDb = Date::GetDates();
	
	if(isset($argv) && $argc > 0)
	{ $bi = new BusyIndicator(count($XmlFromFile->Model), 0); }

	foreach ($XmlFromFile->Model as $Model)
	{
		if(isset($argv) && $argc > 0)
		{ $bi->Next(); }
		
		$ModelInDb = Model::FilterModels($ModelsInDb, null, $Model['firstname'], $Model['lastname']);
		if($ModelInDb){ $ModelInDb = $ModelInDb[0]; }

		/* @var $Model2Process Model */
		$Model2Process = $ModelInDb ? $ModelInDb : new Model();
		
		// Provide a one-model-only import for impatient developers
		if($Model2Process->getID() && $ModelID && $Model2Process->getID() !== $ModelID)
		{ continue; }
		
		$Model2Process->setFirstName((string)$Model->attributes()->firstname);
		$Model2Process->setLastName((string)$Model->attributes()->lastname);

		$birthDate = strtotime((string)$Model->attributes()->birthdate); 
		if($birthDate !== false) { $Model2Process->setBirthdate($birthDate); }
		else { $Model2Process->setBirthdate(-1); }
		
		if($Model->Remarks){
			$Model2Process->setRemarks($Model->Remarks);
		}

		if($Model2Process->getID())
		{
			Model::UpdateModel($Model2Process, $CurrentUser);
		}
		else
		{
			Model::InsertModel($Model2Process, $CurrentUser);
			$modelid = $db->GetLatestID();
			if($modelid) { $Model2Process->setID($modelid); }
		}
		
		$modeltags = Tag::GetTagArray((string)$Model->attributes()->tags);
		$Tag2AllThisModel = Tag2All::FilterTag2Alls($Tag2AllsInDB, null, $Model2Process->getID(), null, null, null);
		Tag2All::HandleTags($modeltags, $Tag2AllThisModel, $TagsInDB, $CurrentUser, $Model2Process->getID(), null, null, null);
		
		if(!$Model->Sets)
		{ continue; }

		foreach($Model->Sets->Set as $Set)
		{
			$SetInDb = Set::FilterSets(
				$SetsInDb,
				$Model2Process->getID(),
				null,
				preg_replace('/^SP_/i', '', (string)$Set->attributes()->name)
			);
			
			if($SetInDb){ $SetInDb = $SetInDb[0]; }

			/* @var $Set2Process Set */
			$Set2Process = $SetInDb ? $SetInDb : new Set();
			$Set2Process->setModel($Model2Process);
			
			if($Set2Process->getModel()->getFirstName() == 'VIP')
			{
				$Set2Process->setPrefix('SP_');
				$Set2Process->setName(preg_replace('/^SP_/i', '', (string)$Set->attributes()->name));
			}
			else if($Set2Process->getModel()->getFirstName() == 'Interviews')
			{
				$Set2Process->setPrefix('In_');
				$Set2Process->setName((string)$Set->attributes()->name);
			}
			else if($Set2Process->getModel()->getFirstName() == 'Promotions')
			{
				$Set2Process->setPrefix(null);
				$Set2Process->setName((string)$Set->attributes()->name);
			}
			else
			{
				$Set2Process->setPrefix('set_');
				$Set2Process->setName((string)$Set->attributes()->name);
			}
			
			if($Set2Process->getID())
			{
				Set::UpdateSet($Set2Process, $CurrentUser);
			}
			else
			{
				Set::InsertSet($Set2Process, $CurrentUser);
				$setid = $db->GetLatestID();
				if($setid) { $Set2Process->setID($setid); }
				
				$CacheImages = CacheImage::GetCacheImages(sprintf('index_id = %1$d', $Model2Process->getID()));
				CacheImage::DeleteImages($CacheImages, $CurrentUser);
			}
			
			$settags = Tag::GetTagArray((string)$Set->attributes()->tags);
			$Tag2AllThisSet = Tag2All::FilterTag2Alls($Tag2AllsInDB, null, null, $Set2Process->getID(), null, null);
			Tag2All::HandleTags($settags, $Tag2AllThisSet, $TagsInDB, $CurrentUser, null, $Set2Process->getID(), null, null);
			
			$datesPic = array();
			$datesVid = array();
			
			preg_match_all('/[0-9]{4}-[01][0-9]-[0123][0-9]/ix', (string)$Set->attributes()->date_pic, $datesPic);
			$Set2Process->setDatesPic(
				Date::ParseDates($datesPic[0], DATE_KIND_IMAGE, $Set2Process)
			);

			preg_match_all('/[0-9]{4}-[01][0-9]-[0123][0-9]/ix', (string)$Set->attributes()->date_vid, $datesVid);
			$Set2Process->setDatesVid(
				Date::ParseDates($datesVid[0], DATE_KIND_VIDEO, $Set2Process)
			);
			
			
			// Reset the Set's CONTAINS_WHAT
			$Set2Process->setContainsWhat(SET_CONTENT_NONE);
			
			
			if($Set2Process->getDatesPic())
			{
				$Set2Process->setContainsWhat(
					$Set2Process->getContainsWhat() | SET_CONTENT_IMAGE
				);
			}
			
			if($Set2Process->getDatesVid())
			{
				$Set2Process->setContainsWhat(
					$Set2Process->getContainsWhat() | SET_CONTENT_VIDEO
				);
			}
			
			// Update the Set's CONTAINS_WHAT 
			Set::UpdateSet($Set2Process, $CurrentUser);
			
			
			/* @var $Date Date */
			/* @var $dateInDb Date */
			foreach ($Set2Process->getDatesPic() as $Date)
			{
				$dateInDb = Date::FilterDates($DatesInDb, null, $Set2Process->getModel()->getID(), $Set2Process->getID(), DATE_KIND_IMAGE, $Date->getTimeStamp());
				
				if($dateInDb)
				{
					$dateInDb = $dateInDb[0];
					$Date->setID($dateInDb->getID());
				}
				
				if($Date->getID())
				{ Date::UpdateDate($Date, $CurrentUser); }
				else
				{ Date::InsertDate($Date, $CurrentUser); }
			}
			
			foreach ($Set2Process->getDatesVid() as $Date)
			{
				$dateInDb = Date::FilterDates($DatesInDb, null, $Set2Process->getModel()->getID(), $Set2Process->getID(), DATE_KIND_VIDEO, $Date->getTimeStamp());
				
				if($dateInDb)
				{
					$dateInDb = $dateInDb[0];
					$Date->setID($dateInDb->getID());
				}
				
				if($Date->getID())
				{ Date::UpdateDate($Date, $CurrentUser); }
				else
				{ Date::InsertDate($Date, $CurrentUser); }
			}
		}
	}
	
	if(isset($argv) && $argc > 0)
	{ $bi->Finish(); }
}

if(!isset($argv) || !$argc)
{ HTMLstuff::RefererRedirect(); }

?>