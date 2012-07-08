<?php
/*	This file is part of CandyDollDB.

CandyDollDB is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

CandyDollDB is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with CandyDollDB.  If not, see <http://www.gnu.org/licenses/>.
*/

include('cd.php');
$CurrentUser = Authentication::Authenticate();

$ModelID = Utils::SafeIntFromQS('model_id');
$SetID = Utils::SafeIntFromQS('set_id');
$VideoID = Utils::SafeIntFromQS('video_id');

if(!isset($ModelID))
{
	header('location:index.php');
	exit;
}

if(!isset($SetID))
{
	header('location:set.php?model_id='.$ModelID);
	exit;
}

$DeleteVideo = (array_key_exists('cmd', $_GET) && $_GET['cmd'] && ($_GET['cmd'] == COMMAND_DELETE));
$ReturnURL = sprintf('video.php?model_id=%1$d&set_id=%2$d', $ModelID, $SetID);


/* @var $Video Video */
/* @var $Set Set */
/* @var $Model Model */
if($VideoID != null)
{
	$WhereClause = sprintf('model_id = %1$d AND set_id = %2$d AND video_id = %3$d AND mut_deleted = -1', $ModelID, $SetID, $VideoID);
	$Videos = Video::GetVideos($WhereClause);

	if($Videos)
	{ $Video = $Videos[0]; }
	else
	{
		header('location:set.php?model_id='.$ModelID);
		exit;
	}

	$Set = $Video->getSet();
	$Model = $Set->getModel();
}
else
{
	$Video = new Video(null, 'New');
	$Set = Set::GetSets(sprintf('set_id = %1d AND mut_deleted = -1', $SetID));

	if($Set)
	{
		$Set = $Set[0];
		$Model = $Set->getModel();
		$Video->setSet($Set);
	}
	else
	{
		header('location:index.php');
		exit;
	}
}


if(array_key_exists('hidAction', $_POST) && $_POST['hidAction'] == 'VideoView')
{
	$Video->setFileName($_POST['txtFilename']);
	$Video->setFileExtension($_POST['txtFileExtension']);
	$Video->setFileSize(intval($_POST['txtFilesize']));
	$Video->setFileCheckSum($_POST['txtFileChecksum']);
	
	if($Video->getID())
	{
		if($DeleteVideo)
		{
			if(Video::DeleteVideo($Video, $CurrentUser))
			{
				header('location:'.$ReturnURL);
				exit;
			}
		}
		else
		{
			if(Video::UpdateVideo($Video, $CurrentUser))
			{
				header('location:'.$ReturnURL);
				exit;
			}
		}
	}
	else
	{
		if(Video::InsertVideo($Video, $CurrentUser))
		{
			header('location:'.$ReturnURL);
			exit;
		}
	}
}

echo HTMLstuff::HtmlHeader($Model->GetShortName(true).' - Set '.$Set->getName().' - Video', $CurrentUser);

?>

<h2><?php echo sprintf(
	'<a href="index.php">Home</a> - <a href="model_view.php?model_id=%1$d">%4$s</a> - <a href="set.php?model_id=%1$d">Sets</a> -  <a href="set_view.php?model_id=%1$d&amp;set_id=%2$d">Set %5$s</a> - <a href="video.php?model_id=%1$d&amp;set_id=%2$d">Videos</a> - %6$s',
	$ModelID,
	$SetID,
	$VideoID,
	htmlentities($Model->GetShortName(true)),
	htmlentities($Set->getName()),
	htmlentities($Video->getFileName())
); ?></h2>

<form action="<?php echo htmlentities($_SERVER['REQUEST_URI']);?>" method="post">
<fieldset>
<legend>Please fill in these fields:</legend>

<input type="hidden" id="hidAction" name="hidAction" value="VideoView" />

<div class="FormRow">
<label for="txtFilename">Filename: <em>*</em></label>
<input type="text" id="txtFilename" name="txtFilename" maxlength="100" value="<?php echo $Video->getFileName();?>"<?php echo HTMLstuff::DisabledStr($DeleteVideo); ?> />
</div>

<div class="FormRow">
<label for="txtFileExtension">Extension: <em>*</em></label>
<input type="text" id="txtFileExtension" name="txtFileExtension" maxlength="10" value="<?php echo $Video->getFileExtension();?>"<?php echo HTMLstuff::DisabledStr($DeleteVideo); ?> />
</div>

<div class="FormRow">
<label for="txtFilesize">Filesize (bytes): <em>*</em></label>
<input type="text" id="txtFilesize" name="txtFilesize" maxlength="10" value="<?php echo $Video->getFileSize(); ?>"<?php echo HTMLstuff::DisabledStr($DeleteVideo); ?> />
</div>

<div class="FormRow">
<label for="txtFileChecksum">Checksum: <em>*</em></label>
<input type="text" id="txtFileChecksum" name="txtFileChecksum" maxlength="32" value="<?php echo $Video->getFileCheckSum();?>"<?php echo HTMLstuff::DisabledStr($DeleteVideo); ?> />
</div>

<div class="FormRow"><label>&nbsp;</label>
<input type="submit" class="FormButton" value="<?php echo $DeleteVideo ? 'Delete' : 'Save'; ?>" />
<input type="button" class="FormButton" value="Cancel" onclick="window.location='<?php echo htmlentities($ReturnURL); ?>';" />
<input type="button" class="FormButton" value="Clear cacheimage" onclick="window.location='cacheimage_delete.php?video_id=<?php echo $VideoID ?>';"<?php echo HTMLstuff::DisabledStr($DeleteVideo); ?> />
</div>

<div class="Separator"></div>

<?php echo $VideoID ? HTMLstuff::Button(sprintf('download_image.php?video_id=%1$d&amp;width=800&amp;height=600', $VideoID), 'Thumbnails', 'rel="lightbox"') : ''; ?>

<?php echo HTMLstuff::Button('index.php', 'Home'); ?>

</fieldset>
</form>

<?php
echo HTMLstuff::HtmlFooter($CurrentUser);
?>