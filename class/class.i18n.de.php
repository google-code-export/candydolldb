<?php

class LabelsDE extends Labels
{
	public static function LabelExists($key){
		return array_key_exists($key, self::$Labels) && strlen(self::$Labels[$key]) > 0;
	}
	
	/**
	 * All user readable strings used in the application, in German 
	 * @var array
	 */
	public static $Labels = array(
		'ErrorLoginErrorHyperlinkInvalid' => '',
		'ErrorLoginErrorPasswordIncorect' => '',
		'ErrorLoginErrorPasswordsNotIdentical' => '',
		'ErrorLoginErrorUnknown' => '',
		'ErrorLoginErrorUsernameEmailCombo' => '',
		'ErrorLoginErrorUsernameNotFound' => '',
		'ErrorNotAllRequiredData' => '',
		'ErrorPleaseUseWebInterfaceForSetup' => 'Benutzen Sie bitte das Webformular zur Einrichtung dieses Programms.',
		'ErrorSQLErrorTableNotExist' => '',
		'ErrorSQLErrorUnknown' => '',
		'ErrorSyntaxEmailAddress' => '',
		'ErrorSyntaxErrorUnknown' => '',
		'ErrorUnknownError' => '',
		'ErrorUploadErrorMaxFilesize' => '',
		'ErrorUploadErrorMaxFilesizeIni' => '',
		'ErrorUploadErrorMissingTempFolder' => '',
		'ErrorUploadErrorNoFile' => '',
		'ErrorUploadErrorOK' => '',
		'ErrorUploadErrorPartialUpload' => '',
		'ErrorUploadErrorPHPExtension' => '',
		'ErrorUploadErrorUnknown' => '',
		'ErrorUploadErrorWriteToDisk' => '',
		'ErrorUploadErrorWriteToDisk' => '',
		
		'CLIFinished' => 'Fertig.',
		'FooterBy' => '',
		'FooterLoggedInAs' => '',
		'FooterLastLogin' => 'Letzter Besuch',
		'FooterNever' => 'niemals',
		
		'NavigationAdminPanel' => '',
		'NavigationDirtySets' => '',
		'NavigationFeatures' => '',
		'NavigationHome' => '',
		'NavigationImage' => '',
		'NavigationImages' => '',
		'NavigationLogIn' => 'Anmelden',
		'NavigationLogOut' => 'Abmelden',
		'NavigationManageTags' => '',
		'NavigationModel' => '',
		'NavigationModels' => 'Modelle',
		'NavigationMultiDownload' => '',
		'NavigationMyAccount' => '',
		'NavigationNewModel' => 'Neues Model',
		'NavigationProcessXML' => '',
		'NavigationResetYourPassword' => 'Kennwort zurücksetzen',
		'NavigationSearch' => 'Suchen',
		'NavigationSet' => '',
		'NavigationSets' => '',
		'NavigationTagSearch' => 'Tag-Suche',
		'NavigationUsers' => 'Benutzer',
		'NavigationVideo' => '',
		'NavigationVideos' => '',
		
		'LabelAllModels' => '',
		'LabelBirthdate' => 'Geburtsdatum',
		'LabelBirthdateShort' => 'Geboren',
		'LabelChecksum' => 'Prüfsumme',
		'LabelClean' => '',
		'LabelCleanCacheFolder' => '',
		'LabelDate' => 'Datum',
		'LabelDates' => '',
		'LabelDeleteDate' => 'Datum löschen',
		'LabelDeleteImage' => '',
		'LabelDeleteModel' => 'Model löschen',
		'LabelDirty' => '',
		'LabelDownloadImage' => '',
		'LabelDownloadImages' => '',
		'LabelDownloadIndex' => '',
		'LabelDownloadXML' => '',
		'LabelEditModel' => 'Model bearbeiten',
		'LabelEmailAddress' => '',
		'LabelExtension' => 'Dateiendung',
		'LabelFilename' => 'Dateiname',
		'LabelFilesize' => 'Dateigröße',
		'LabelLastname' => '',
		'LabelHeight' => 'Höhe',
		'LabelImagesParentheses' => '(Fotos)',
		'LabelIncludeImages' => '',
		'LabelIncludeVideos' => '',
		'LabelIndexOf' => '',
		'LabelInfo' => 'Info',
		'LabelLastname' => 'Nachname',
		'LabelMissingFiles0' => '',
		'LabelMissingFiles1' => '',
		'LabelMissingFilesX' => '',
		'LabelModel' => 'Model',
		'LabelMultiDownloadStep1' => '',
		'LabelMultiDownloadStep2' => '',
		'LabelMultiDownloadStep3' => '',
		'LabelMultiDownloadUseSubfolders' => '',
		'LabelName' => 'Name',
		'LabelNew' => 'Neu',
		'LabelNewPassword' => 'Neues Kennwort',
		'LabelOrphanFiles0' => '',
		'LabelOrphanFiles1' => '',
		'LabelOrphanFilesX' => '',
		'LabelPassword' => 'Kennwort',
		'LabelPicSets' => '',
		'LabelPrefix' => '',
		'LabelRemarks' => '',
		'LabelRepeatPassword' => '',
		'LabelResultsPerPage' => '',
		'LabelSearchFor' => 'Suchen nach',
		'LabelShowingXResults' => '<p>%1$s Treffer</p>',
		'LabelTaggedWith' => '',
		'LabelTags' => '',
		'LabelTitleMr' => '',
		'LabelTitleMrMrs' => '',
		'LabelTitleMrs' => '',
		'LabelTotalImageCount' => '',
		'LabelTotalModelCount' => '',
		'LabelTotalSetCount' => '',
		'LabelUsername' => 'Benutzername',
		'LabelVideosParentheses' => '(Videos)',
		'LabelVidSets' => '',
		'LabelViewImage' => '',
		'LabelViewIndexSlideshow' => '',
		'LabelViewSlideshow' => '',
		'LabelWidth' => 'Breite',
		'LabelXtoYofZ' => '%1$d bis %2$d von %3$d',
		
		'ButtonCancel' => 'Abbrechen',
		'ButtonClean' => '',
		'ButtonClearCacheImage' => '',
		'ButtonClearIndexCacheImage' => '',
		'ButtonDelete' => 'Löschen',
		'ButtonDownload' => 'Herunterladen',
		'ButtonImportImages' => '',
		'ButtonImportVideos' => '',
		'ButtonIndex' => '',
		'ButtonIndexSlideshow' => '',
		'ButtonLogin' => 'Anmelden',
		'ButtonNewImage' => '',
		'ButtonNext' => 'Weiter',
		'ButtonPageFirst' => 'Erste Seite',
		'ButtonPageLast' => 'letzte Seite',
		'ButtonPageNext' => 'Nächste Seite',
		'ButtonPagePrevious' => 'Vorherige Seite',
		'ButtonReset' => '',
		'ButtonReturn' => 'Zurück',
		'ButtonSave' => 'Speichern',
		'ButtonSearch' => 'Suchen',
		'ButtonSend' => '',

		'MessageForgotYourPassword' => '',
		'MessageSureDeleteDate' => '',
		'MessageCDDBInfo' => "<p>This application is a tribute to the breathtaking beauty of the models shown on <a href=\"http://www.candydoll.tv/\" rel=\"external\">CandyDoll.tv</a> (キャンディドール).</p><p>In CandyDoll's own words:</p>",
		'MessageEnjoy' => 'Enjoy!',
		'MessagePasswordReset' => '',
		'MessagePasswordEnterRepeat' => '',
		'MessagePasswordResetError' => '',
		'MessagePasswordResetSuccess' => '',
		'MessagePasswordResetSendError' => ''
	);
}

?>