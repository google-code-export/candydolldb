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


/* @var $Model Model */
/* @var $Set Set */
$Model = null;
$Set = null;
$VideoRows = '';
$VideoCount = 0;

$WhereClause = sprintf('model_id = %1$d AND set_id = %2$d AND mut_deleted = -1', $ModelID, $SetID);
$Videos = Video::GetVideos($WhereClause);

if($Videos)
{
	/* @var $Video Video */
	foreach($Videos as $Video)
	{
		$VideoCount++;
		if(!$Set) { $Set = $Video->getSet(); }
		if(!$Model) { $Model = $Set->getModel(); }

		$VideoRows .= sprintf(
		"\n<tr class=\"Row%10\$d\">".
    		"<td><a href=\"video_view.php?model_id=%3\$d&amp;set_id=%2\$d&amp;video_id=%1\$d\">%4\$s</a></td>".
        	"<td class=\"Center\">%5\$s</td>".
	    	"<td class=\"Center\">%6\$s</td>".
        	"<td>%7\$s</td>".
			"<td class=\"Center\"><a href=\"download_vid.php?video_id=%1\$d\"><img src=\"images/button_download.png\" width=\"16\" height=\"16\" alt=\"Download video\" title=\"Download video\" /></a></td>".
			"<td class=\"Center\"><a href=\"download_image.php?video_id=%1\$d&amp;width=800&amp;height=600\" rel=\"lightbox-thumb\" title=\"Thumbnails of %4\$s\"><img src=\"images/button_view.png\" width=\"16\" height=\"16\" alt=\"Thumbnails of %4\$s\" /></a></td>".
			"<td class=\"Center\"><a href=\"video_view.php?model_id=%3\$d&amp;set_id=%2\$d&amp;video_id=%1\$d&amp;cmd=%9\$s\" title=\"Delete video\"><img src=\"images/button_delete.png\" width=\"16\" height=\"16\" alt=\"Delete\" /></a></td>".
        "</tr>",
		$Video->getID(),
		$Set->getID(),
		$Model->getID(),
		htmlentities($Video->getFileName()),
		htmlentities($Video->getFileExtension()),
		Utils::ReadableFilesize($Video->getFileSize()),
		htmlentities($Video->getFileCheckSum()),
		null,
		COMMAND_DELETE,
		$VideoCount % 2 == 0 ? 2 : 1
		);
	}
}

if(!$Set)
{
	$Set = Set::GetSets(sprintf('model_id = %1$d AND set_id = %2$d', $ModelID, $SetID));
	if($Set)
	{
		$Set = $Set[0];
		$Model = $Set->getModel();
	}
	else
	{
		header('location:index.php');
		exit;
	}
}

echo HTMLstuff::HtmlHeader(sprintf('%1$s - Set %2$s - Videos', $Model->GetShortName(true), $Set->getName()), $CurrentUser);

?>

<h2><?php echo sprintf(
	'<a href="index.php">Home</a> - <a href="model_view.php?model_id=%1$d">%3$s</a> - <a href="set.php?model_id=%1$d">Sets</a> - <a href="set_view.php?model_id=%1$d&amp;set_id=%2$d">Set %4$s</a> - Videos',
	$ModelID,
	$SetID,
	htmlentities($Model->GetShortName(true)),
	htmlentities($Set->getName())
); ?></h2>

<div class="Separator"></div>

<table border="0" cellpadding="4" cellspacing="0">
	<thead>
		<tr>
			<th>Filename</th>
			<th style="width: 60px;">Extension</th>
			<th style="width: 80px;">Filesize</th>
			<th style="width: 290px;">Checksum</th>
			<th style="width: 22px;">&nbsp;</th>
			<th style="width: 22px;">&nbsp;</th>
			<th style="width: 22px;">&nbsp;</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th colspan="7">Total Video count: <?php printf('%1$d', $VideoCount); ?></th>
		</tr>
	</tfoot>
	<tbody>
	<?php echo $VideoRows ? $VideoRows : '<tr class="Row1"><td colspan="7">&nbsp;</td></tr>'; ?>
	</tbody>
</table>

<?php

echo HTMLstuff::Button(sprintf('video_view.php?model_id=%1$d&amp;set_id=%2$d', $ModelID, $SetID), 'New video');

echo HTMLstuff::Button(sprintf('import_video.php?model_id=%1$d&amp;set_id=%2$d', $ModelID, $SetID), 'Import videos');

echo HTMLstuff::Button(sprintf('set.php?model_id=%1$d', $ModelID), 'Sets');

echo HTMLstuff::Button('index.php');

echo HTMLstuff::HtmlFooter($CurrentUser);
?>