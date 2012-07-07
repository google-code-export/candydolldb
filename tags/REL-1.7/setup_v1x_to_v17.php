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

require('cd.php');

$q = null;
$Exists = false;
$NoError = true;

if(array_key_exists('hidAction', $_POST) && isset($_POST['hidAction']) && $_POST['hidAction'] == 'UpdateCandyDollDB')
{
	/* model_remarks column */
	$q = mysql_query("SHOW COLUMNS FROM `Model` LIKE 'model_remarks'");
	$Exists = mysql_fetch_assoc($q);

	if($NoError && !$Exists)
	{ $NoError = $db->ExecuteQueries("ALTER TABLE `Model` ADD `model_remarks` TEXT NULL DEFAULT NULL AFTER `model_birthdate`"); }
	
	/* user_datedisplayoptions column */
	$q = mysql_query("SHOW COLUMNS FROM `User` LIKE 'user_datedisplayopts'");
	$Exists = mysql_fetch_assoc($q);

	if($NoError && !$Exists)
	{ $NoError = $db->ExecuteQueries("ALTER TABLE `User` ADD `user_datedisplayopts` int NOT NULL DEFAULT 0 AFTER `user_email`"); }

	/* user_imageview column */
	$q = mysql_query("SHOW COLUMNS FROM `User` LIKE 'user_imageview'");
	$Exists = mysql_fetch_assoc($q);

	if($NoError && !$Exists)
	{ $NoError = $db->ExecuteQueries("ALTER TABLE `User` ADD `user_imageview` varchar(20) NOT NULL DEFAULT 'detail' AFTER `user_datedisplayopts`"); }
	
	/* user_language column */
	$q = mysql_query("SHOW COLUMNS FROM `User` LIKE 'user_language'");
	$Exists = mysql_fetch_assoc($q);

	if($NoError && !$Exists)
	{ $NoError = $db->ExecuteQueries("ALTER TABLE `User` ADD `user_language` varchar(20) NOT NULL DEFAULT 'en' AFTER `user_imageview`"); }

	$UpdateDBSQL = <<<FjbMNnvUJheiwewUJfheJheuehFJDUHdywgwwgHGfgywug
SET AUTOCOMMIT=0;
START TRANSACTION;

CREATE TABLE IF NOT EXISTS `CacheImage` (
  `cache_id` varchar(36) NOT NULL,
  `model_id` bigint(20) DEFAULT NULL,
  `index_id` bigint(20) DEFAULT NULL,
  `set_id` bigint(20) DEFAULT NULL,
  `image_id` bigint(20) DEFAULT NULL,
  `video_id` bigint(20) DEFAULT NULL,
  `cache_imagewidth` int(11) NOT NULL DEFAULT '0',
  `cache_imageheight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cache_id`),
  KEY `model_id` (`model_id`),
  KEY `index_id` (`index_id`),
  KEY `set_id` (`set_id`),
  KEY `image_id` (`image_id`),
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Tag` (
  `tag_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) NOT NULL,
  `mut_id` bigint(20) NOT NULL,
  `mut_date` bigint(20) NOT NULL DEFAULT '-1',
  `mut_deleted` bigint(20) NOT NULL DEFAULT '-1',
  
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `UNIQ_TAG` (`mut_deleted`,`tag_name`),
  KEY `mut_id` (`mut_id`),
  
  CONSTRAINT `Tag_ibfk_1` FOREIGN KEY (`mut_id`) REFERENCES `User` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `Tag2All`;
CREATE TABLE IF NOT EXISTS `Tag2All` (
  `tag_id` bigint(20) NOT NULL,
  `model_id` bigint(20) NULL DEFAULT NULL,
  `set_id` bigint(20) NULL DEFAULT NULL,
  `image_id` bigint(20) NULL DEFAULT NULL,
  `video_id` bigint(20) NULL DEFAULT NULL,

  KEY `tag_id` (`tag_id`),
  KEY `model_id` (`model_id`),
  KEY `set_id` (`set_id`),
  KEY `image_id` (`image_id`),
  KEY `video_id` (`video_id`),
  
  CONSTRAINT `Tag2All_ibfk_1` FOREIGN KEY (`tag_id`)   REFERENCES `Tag`   (`tag_id`)   ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Tag2All_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `Model` (`model_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Tag2All_ibfk_3` FOREIGN KEY (`set_id`)   REFERENCES `Set`   (`set_id`)   ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Tag2All_ibfk_4` FOREIGN KEY (`image_id`) REFERENCES `Image` (`image_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Tag2All_ibfk_5` FOREIGN KEY (`video_id`) REFERENCES `Video` (`video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP VIEW IF EXISTS `vw_Model`;
CREATE ALGORITHM=UNDEFINED VIEW `vw_Model` AS select `Model`.`model_id` AS `model_id`,`Model`.`model_firstname` AS `model_firstname`,`Model`.`model_lastname` AS `model_lastname`,`Model`.`model_birthdate` AS `model_birthdate`, `Model`.`model_remarks` AS `model_remarks`, `Model`.`mut_deleted` AS `mut_deleted`,(select count(`Set`.`model_id`) AS `count(``model_id``)` from `Set` where ((`Set`.`model_id` = `Model`.`model_id`) and (`Set`.`mut_deleted` = -(1)))) AS `model_setcount` from `Model`;

DROP VIEW IF EXISTS `vw_Tag2All`;
CREATE ALGORITHM=UNDEFINED VIEW `vw_Tag2All` AS	select `Tag2All`.`tag_id` AS `tag_id`, `Tag`.`tag_name` AS `tag_name`, `Tag2All`.`model_id` AS `model_id`, `Tag2All`.`set_id` AS `set_id`, `Tag2All`.`image_id` AS `image_id`, `Tag2All`.`video_id` AS `video_id` from `Tag2All` join `Tag` on `Tag`.`tag_id` = `Tag2All`.`tag_id`;
  
COMMIT;
SET AUTOCOMMIT=1;

FjbMNnvUJheiwewUJfheJheuehFJDUHdywgwwgHGfgywug;

	if($NoError && $db->ExecuteQueries($UpdateDBSQL))
	{
		die($lang->g('MessageDataseUpdated'));
	}
	else
	{
		die(sprintf(
			$lang->g('ErrorUpdateTryAgain'),
			$_SERVER['REQUEST_URI']
		));
	}
}
else
{
	echo HTMLstuff::HtmlHeader($lang->g('LabelSetup'))?>

<h2 class="Hidden"><?php echo $lang->g('LabelSetup')?></h2>

<div class="CenterForm">

<form action="<?php echo htmlentities($_SERVER['REQUEST_URI'])?>" method="post">
<fieldset>

<input type="hidden" id="hidAction" name="hidAction" value="UpdateCandyDollDB" />

<h2 class="Center"><?php echo sprintf($lang->g('LabelUpdateToVersionX'), CANDYDOLLDB_VERSION)?></h2>

<?php echo sprintf($lang->g('MessageSureUpdateToX'), CANDYDOLLDB_VERSION)?>

<div class="Separator"></div>

<div class="Center">
<input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $lang->g('ButtonYesPleaseUpdate' )?>" />
<input type="button" id="btnCancel" name="btnCancel" value="<?php echo $lang->g('ButtonNoThanks' )?>" onclick="return false;" />
</div>

</fieldset>
</form>

</div>

<?php
}
echo HTMLstuff::HtmlFooter();
?>