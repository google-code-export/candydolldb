<?php

include('cd.php');
ini_set('max_execution_time', '3600');
$CurrentUser = Authentication::Authenticate();
ob_start();

if(!$CurrentUser->hasPermission(RIGHT_EXPORT_SFV))
{
	$e = new Error(RIGHTS_ERR_USERNOTALLOWED);
	Error::AddError($e);
	HTMLstuff::RefererRedirect();
}

$ModelID = Utils::SafeIntFromQS('model_id');
$includepath = Utils::SafeIntFromQS('includepath');
$includepath = in_array($includepath, array(EXPORT_PATH_OPTION_NONE, EXPORT_PATH_OPTION_RELATIVE, EXPORT_PATH_OPTION_FULL)) ? $includepath : EXPORT_PATH_OPTION_NONE; 

$filedate = date('H:i.s Y-m-d');
$sfvOutput = NULL;

$Models = Model::GetModels(new ModelSearchParameters(
	is_null($ModelID) ? FALSE : $ModelID));
$Sets = Set::GetSets(new SetSearchParameters(
	FALSE,
	FALSE,
	is_null($ModelID) ? FALSE : $ModelID));

$SFVHeader = <<<HfjdUd8Bfhsdb8389BudfhnJUfsklsfsfw
; Generated by CandyDollDB v%1\$s on %2\$s at %3\$s
; Author: %4\$s
; Project website: https://code.google.com/p/candydolldb/
;

HfjdUd8Bfhsdb8389BudfhnJUfsklsfsfw;

$outfile = 'CandyDollDB.sfv';
if($ModelID && count($Models) > 0){
	$Model = $Models[0];
	$outfile = sprintf('CandyDollDB %1$s.sfv', $Model->GetFullName());
}

header(sprintf('Content-Type: %1$s', Utils::GetMime('sfv')));
header(sprintf('Content-Disposition: attachment; filename="%1$s"', $outfile));

printf($SFVHeader, CANDYDOLLDB_VERSION, date('Y-m-d'), date('H:i:s'), $CurrentUser->getUserName());

/* @var $Model Model */
foreach ($Models as $Model)
{
	if($ModelID && $Model->getID() !== $ModelID)
	{ continue; }
	
	$SetsThisModel = Set::Filter($Sets, $Model->getID());
	if($SetsThisModel)
	{
		/* @var $Set Set */
		foreach ($SetsThisModel as $Set)
		{
			$ImagesThisSet = Image::GetImages(new ImageSearchParameters(FALSE, FALSE, $Set->getID(), FALSE, $Model->getID()));
			
			if($ImagesThisSet)
			{
				/* @var $Image Image */
				foreach($ImagesThisSet as $Image)
				{
					if(Utils::_empty($Image->getFileCRC32()))
					{ continue; }
					
					printf('; %1$12d  %2$s %3$s%4$s', $Image->getFileSize(), $filedate, $Image->getExportFilename(), PHP_EOL);
					$sfvOutput .= sprintf('%1$s %2$s%3$s', $Image->getExportFilename($includepath), $Image->getFileCRC32(), PHP_EOL);
				}
			}
			
			$VideosThisSet = Video::GetVideos(new VideoSearchParameters(FALSE, FALSE, $Set->getID(), FALSE, $Model->getID()));
			
			if($VideosThisSet)
			{
				/* @var $Video Video */
				foreach($VideosThisSet as $Video)
				{
					if(Utils::_empty($Video->getFileCRC32()))
					{ continue; }
					
					printf('; %1$12d  %2$s %3$s%4$s', $Video->getFileSize(), $filedate, $Video->getExportFilename(), PHP_EOL);
					$sfvOutput .= sprintf('%1$s %2$s%3$s', $Video->getExportFilename($includepath), $Video->getFileCRC32(), PHP_EOL);
				}
			}
		}
		ob_flush();
		flush();
	}
	ob_flush();
	flush();
}

print $sfvOutput;

ob_end_flush();
flush();

exit;

?>