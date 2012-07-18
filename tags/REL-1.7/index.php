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


$SearchModel = '';
$SearchDirty = true;
$SearchClean = true;
$ModelRows = '';
$ModelCount = 0;
$SetCount = 0;


if(array_key_exists('hidAction', $_POST) && $_POST['hidAction'] == 'ModelFilter')
{
	$SearchModel = $_SESSION['txtSearchModel'] 	= $_POST['txtSearchModel'];
	$SearchDirty = $_SESSION['chkDirty'] 		= array_key_exists('chkDirty', $_POST);
	$SearchClean = $_SESSION['chkClean'] 		= array_key_exists('chkClean', $_POST);
}
else
{
	$SearchModel = array_key_exists('txtSearchModel', $_SESSION) ? $_SESSION['txtSearchModel'] : '';
	$SearchDirty = array_key_exists('chkDirty', $_SESSION) ? (bool)$_SESSION['chkDirty'] : true;
	$SearchClean = array_key_exists('chkClean', $_SESSION) ? (bool)$_SESSION['chkClean'] : true; 
}

$WhereClause = sprintf(
	"CONCAT_WS(' ', model_firstname, model_lastname) LIKE '%%%1\$s%%' AND mut_deleted = -1",
	mysql_real_escape_string($SearchModel)
);

$Models = Model::GetModels($WhereClause);
$Sets = Set::GetSets();


if($Models)
{
	/* @var $Model Model */
	foreach($Models as $Model)
	{
		$SetPicCount = 0;
		$SetVidCount = 0;
		
		$DirtySetCount = 0;
		$DirtySetPicCount = 0;
		$DirtySetVidCount = 0;
		$WhereDateClause = sprintf('model_id = %1$d AND mut_deleted = -1', $Model->getID());
		$Dates = Date::GetDates($WhereDateClause, "date_timestamp ASC");
		if($Dates)
		{
			$datestart = $Dates[0];
			$datestartshow = date($CurrentUser->getDateFormat(), $datestart->getTimeStamp());
			$dateend = end($Dates);
			$dateendshow = date($CurrentUser->getDateFormat(), $dateend->getTimeStamp());
		}
		else
		{
			$datestartshow = null;
			$dateendshow = null;
		}
		
		/* @var $Set Set */
		foreach(Set::FilterSets($Sets, $Model->getID()) as $Set)
		{
			$SetCount++;
			if($Set->getSetIsDirty())
			{
				if($Set->getSetIsDirtyPic())
				{ $DirtySetPicCount++; }
				
				if($Set->getSetIsDirtyVid())
				{ $DirtySetVidCount++; }
				
				$DirtySetCount++;
			}
			
			if(($Set->getContainsWhat() & SET_CONTENT_IMAGE) > 0)
			{ $SetPicCount++; }
				
			if(($Set->getContainsWhat() & SET_CONTENT_VIDEO) > 0)
			{ $SetVidCount++; }
		}
		unset($Set);
		
		if( !($SearchDirty && $SearchClean) && (	// NOT both checkboxes checked AND (
			(!$SearchDirty && !$SearchClean) ||		// both checkboxes unchecked OR
			($SearchClean && $DirtySetCount > 0) ||	// clean requested, yet this model is dirty OR
			($SearchDirty && $DirtySetCount == 0) )	// dirty requested, yet this model is clean )
		){
			continue;
		}
		
		$ModelCount++;
		
		$ModelRows .= sprintf(
			"<div class=\"ThumbGalItem\">
			<h3 class=\"Hidden\">%1\$s</h3>
			
			<div class=\"ThumbImageWrapper\">
			<a href=\"set.php?model_id=%2\$d\">
			<img src=\"download_image.php?model_id=%2\$d&amp;portrait_only=true&amp;width=150&amp;height=225\" width=\"150\" height=\"225\" alt=\"%1\$s\" title=\"%1\$s\" />
			</a>
			</div>
			
			<div class=\"ThumbDataWrapper\">
			<ul>
			<li>%11\$s: %1\$s</li>
			<li>%12\$s: %5\$s%6\$s</li>
			<li>%23\$s: %21\$s</li>
			<li>%24\$s: %22\$s</li>
			<li>%13\$s: %8\$d%7\$s</li>
			<li>%14\$s: %10\$d%9\$s</li>
			</ul>
			</div>
			
			<div class=\"ThumbButtonWrapper\">
			<a href=\"model_view.php?model_id=%2\$d\"><img src=\"images/button_edit.png\" width=\"16\" height=\"16\" title=\"%15\$s\" alt=\"%15\$s\"/></a>
			<a href=\"import_image.php?model_id=%2\$d\"><img src=\"images/button_upload.png\" width=\"16\" height=\"16\" alt=\"%16\$s\" title=\"%16\$s\" /></a>
			<a href=\"import_video.php?model_id=%2\$d\"><img src=\"images/button_upload.png\" width=\"16\" height=\"16\" alt=\"%17\$s\" title=\"%17\$s\" /></a>
			<a href=\"download_zip.php?model_id=%2\$d\"><img src=\"images/button_download.png\" width=\"16\" height=\"16\" alt=\"%18\$s\" title=\"%18\$s\" /></a>
			<a href=\"download_image.php?index_id=%2\$d&amp;width=500&amp;height=750\" rel=\"lightbox-index\" title=\"%19\$s %1\$s\"><img src=\"images/button_view.png\" width=\"16\" height=\"16\" alt=\"%19\$s %1\$s\" /></a>
			<a href=\"model_view.php?model_id=%2\$d&amp;cmd=%3\$s\" title=\"%20\$s\"><img src=\"images/button_delete.png\" width=\"16\" height=\"16\" alt=\"%20\$s\" /></a>
			</div>
			
			</div>
			
			%4\$s",
			
			htmlentities($Model->GetFullName()),
			$Model->getID(),
			COMMAND_DELETE,
			($ModelCount % 4 == 0 ? "<div class=\"Clear\"></div>" : null),
			$Model->getBirthdate() > 0 ? date($CurrentUser->getDateFormat(), $Model->getBirthdate()) : '&nbsp;',
			$Model->getBirthdate() > 0 ? sprintf(' (%1$.1f)', Utils::CalculateAge($Model->getBirthdate())) : '&nbsp;',
			$DirtySetPicCount > 0 ? sprintf(', <em>%1$d %2$s</em>', $DirtySetPicCount, strtolower($lang->g('LabelDirty'))) : null,
			$SetPicCount,
			$DirtySetVidCount > 0 ? sprintf(', <em>%1$d %2$s</em>', $DirtySetVidCount, strtolower($lang->g('LabelDirty'))) : null,
			$SetVidCount,
			$lang->g('LabelName'),
			$lang->g('LabelBirthdateShort'),
			$lang->g('LabelPicSets'),
			$lang->g('LabelVidSets'),
			$lang->g('LabelEditModel'),
			$lang->g('ButtonImportImages'),
			$lang->g('ButtonImportVideos'),
			$lang->g('LabelDownloadImages'),
			$lang->g('LabelIndexOf'),
			$lang->g('LabelDeleteModel'),
			$datestartshow,
			$dateendshow,
			$lang->g('LabelStartDate'),
			$lang->g('LabelLastUpdated')
		);
		
	}
	unset($Model);
}

echo HTMLstuff::HtmlHeader($lang->g('NavigationHome'), $CurrentUser);

?>

<form action="<?php echo htmlentities($_SERVER['REQUEST_URI'])?>" method="post" class="FilterForm">
<fieldset>

<input type="hidden" id="hidAction" name="hidAction" value="ModelFilter" />

<label for="txtSearchModel"><?php echo $lang->g('LabelModel')?></label>
<input type="text" id="txtSearchModel" name="txtSearchModel" maxlength="50" value="<?php echo $SearchModel?>" />

<label for="chkDirty"><?php echo $lang->g('LabelDirty')?></label>
<input type="checkbox" id="chkDirty" name="chkDirty"<?php echo HTMLstuff::CheckedStr($SearchDirty)?> />

<label for="chkClean"><?php echo $lang->g('LabelClean')?></label>
<input type="checkbox" id="chkClean" name="chkClean"<?php echo HTMLstuff::CheckedStr($SearchClean)?> />

<input type="submit" id="btnSearch" name="btnSearch" value="<?php echo $lang->g('ButtonSearch')?>" />

<input type="button" id="btnSlideshow" name="btnSlideshow" value="<?php echo $lang->g('ButtonIndexSlideshow')?>" onclick="OpenSlideColorBox();" />

</fieldset>
</form>

<h2><?php echo $lang->g('NavigationHome')?></h2>

<?php

echo "<div class=\"Clear\"></div>".$ModelRows."<div class=\"Clear\"></div>";
?>

<div style="font-weight:bold;text-align:center"><?php echo $lang->g('LabelTotalModelCount')?>: <?php printf('%1$d', $ModelCount)?> | <?php echo $lang->g('LabelTotalSetCount')?>: <?php printf('%1$d', $SetCount)?></div>

<?php
echo HTMLstuff::HtmlFooter($CurrentUser);
?>