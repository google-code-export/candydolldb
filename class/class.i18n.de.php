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
		'ErrorSetupAlreadyComplete' => '%1$s',
		'ErrorSetupConnectDatabase' => '',
		'ErrorSetupCreatingCacheDir' => '',
		'ErrorSetupCreatingDatabase' => '',
		'ErrorSetupCreatingUser' => '(\'%2$s\'), %1$s',
		'ErrorSetupWritingConfig' => '%1$s',
		'ErrorSQLErrorTableNotExist' => '',
		'ErrorSQLErrorUnknown' => '',
		'ErrorSyntaxEmailAddress' => '',
		'ErrorSyntaxErrorUnknown' => '',
		'ErrorUnknownError' => '',
		'ErrorUpdateTryAgain' => '',
		'ErrorUploadErrorMaxFilesize' => '',
		'ErrorUploadErrorMaxFilesizeIni' => '',
		'ErrorUploadErrorMissingTempFolder' => '',
		'ErrorUploadErrorNoFile' => '',
		'ErrorUploadErrorOK' => '',
		'ErrorUploadErrorPartialUpload' => '',
		'ErrorUploadErrorPHPExtension' => '',
		'ErrorUploadErrorUnknown' => '',
		'ErrorUploadErrorWriteToDisk' => '',
		'ErrorUserActionNotAllowed' => '',
		'ErrorXMLErrorNotValidSchema' => '',
		'ErrorXMLErrorNotValidXML' => '',
		'ErrorXMLErrorUnknown' => 'Unbekannter XML-Fehler.',
		
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
		'NavigationImportXML' => '',
		'NavigationLogIn' => 'Anmelden',
		'NavigationLogOut' => 'Abmelden',
		'NavigationManageTags' => '',
		'NavigationModel' => '',
		'NavigationModels' => 'Modelle',
		'NavigationMultiDownload' => '',
		'NavigationMyAccount' => '',
		'NavigationNewModel' => 'Neues Model',
		'NavigationProcessXML' => '',
		'NavigationResetYourPassword' => 'Kennwort zur&uuml;cksetzen',
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
		'LabelBoth' => 'Beide',
		'LabelClean' => '',
		'LabelCleanCacheFolder' => '',
		'LabelCleanUp' => 'Aufr&auml;umen',
		'LabelCollection' => 'Sammlung',
		'LabelColorBoxClose' => 'Schlie&szlig;en',
		'LabelColorBoxCurrent' => 'Foto {current} von {total}',
		'LabelColorBoxNext' => 'N&auml;chstes Foto',
		'LabelColorBoxPrevious' => 'Vorheriges Foto',
		'LabelCommandlineUser' => '',
		'LabelComplete' => 'Komplett',
		'LabelConfiguration' => 'Einstellungen',
		'LabelContains' => '',
		'LabelDatabase' => 'Datenbank',
		'LabelDatabaseName' => 'Datenbankname',
		'LabelDate' => 'Datum',
		'LabelDates' => '',
		'LabelDeleteDate' => 'Datum l&ouml;schen',
		'LabelDeleteImage' => '',
		'LabelDeleteModel' => 'Model l&ouml;schen',
		'LabelDeleteSelectedTag' => '',
		'LabelDeleteSet' => '',
		'LabelDeleteUser' => 'Benutzer l&ouml;schen',
		'LabelDeleteVideo' => 'Video l&ouml;schen',
		'LabelDirty' => '',
		'LabelDownloadImage' => '',
		'LabelDownloadImages' => '',
		'LabelDownloadIndex' => '',
		'LabelDownloadSFV' => '',
		'LabelDownloadVideo' => '',
		'LabelDownloadVideos' => '',
		'LabelDownloadXML' => '',
		'LabelEditModel' => 'Model bearbeiten',
		'LabelEditSet' => '',
		'LabelEmailAddress' => '',
		'LabelExports' => '',
		'LabelExtension' => 'Dateiendung',
		'LabelFemale' => 'Weiblich',
		'LabelFilename' => 'Dateiname',
		'LabelFilesize' => 'Dateigr&ouml;&szlig;e',
		'LabelFirstAppearance' => '',
		'LabelFirstname' => 'Vorname',
		'LabelFullName' => '',
		'LabelGender' => 'Gesl&auml;cht',
		'LabelHeight' => 'H&ouml;he',
		'LabelHostname' => 'Servername',
		'LabelImagesParentheses' => '(Fotos)',
		'LabelIncludeImages' => '',
		'LabelIncludePath' => '',
		'LabelIncludeTags' => '',
		'LabelIncludeVideos' => '',
		'LabelIndexOf' => '',
		'LabelInfo' => 'Info',
		'LabelInsertion' => '',
		'LabelLanguage' => 'Sprache',
		'LabelLanguage_de' => 'Deutsch',
		'LabelLanguage_en' => 'Englisch',
		'LabelLanguage_nl' => 'Niederl&auml;ndisch',
		'LabelLastActive' => '',
		'LabelLastAppearance' => '',
		'LabelLastLogin' => '',
		'LabelLastname' => '',
		'LabelLastname' => 'Nachname',
		'LabelLastUpdated' => '',
		'LabelMailServer' => 'Mailserver',
		'LabelMale' => 'M&auml;nnlich',
		'LabelMD5Checksum' => 'MD5-Pr&uuml;fsumme',
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
		'LabelNewUser' => 'Neuer Benutzer',
		'LabelNewVideo' => 'Neues Video',
		'LabelNotAllowed' => '',
		'LabelOrphanFiles0' => '',
		'LabelOrphanFiles1' => '',
		'LabelOrphanFilesX' => '',
		'LabelPassword' => 'Kennwort',
		'LabelPasswordGarbage' => 'kEnNw0Rt',
		'LabelPathImages' => 'Foto\'s Pfad',
		'LabelPathToCandyDollLinux' => '/pfad/zu/candydoll_fotos',
		'LabelPathToCandyDollVideosLinux' => '/pfad/zu/candydoll_videos',
		'LabelPathToCandyDollVideosWin' => 'C:\\Pfad\\Zu\\Candydoll_Videos',
		'LabelPathToCandyDollWin' => 'C:\\Pfad\\Zu\\Candydoll_Fotos',
		'LabelPathVideos' => 'Video\'s Pfad',
		'LabelPicSets' => '',
		'LabelPort' => 'Port',
		'LabelPrefix' => '',
		'LabelReEnter' => '',
		'LabelRemarks' => '',
		'LabelRepeatPassword' => '',
		'LabelResultsPerPage' => '',
		'LabelRevisitThisPage' => '',
		'LabelSearchFor' => 'Suchen nach',
		'LabelSelectDateFormat' => '',
		'LabelSelectImageFormat' => '',
		'LabelSenderAddress' => 'Absender (Adresse)',
		'LabelSenderName' => 'Absender (Name)',
		'LabelSetCount' => '',
		'LabelSetup' => '',
		'LabelSFVPathFull' => '',
		'LabelSFVPathNone' => '',
		'LabelSFVPathRelative' => '',
		'LabelShowingXResults' => '<p>%1$s Treffer</p>',
		'LabelSMTPAuth' => '',
		'LabelSorting' => 'Sortierung',
		'LabelSortingASC' => '',
		'LabelSortingDESC' => '',
		'LabelStartDate' => '',
		'LabelSuffixDefault' => '',
		'LabelSystem' => 'System',
		'LabelTagged' => '',
		'LabelTaggedWith' => '',
		'LabelTags' => '',
		'LabelThumbnails' => '',
		'LabelTitleMr' => '',
		'LabelTitleMrMrs' => '',
		'LabelTitleMrs' => '',
		'LabelTotalImageCount' => '',
		'LabelTotalModelCount' => '',
		'LabelTotalSetCount' => '',
		'LabelTotalTagCount' => '',
		'LabelTotalUserCount' => '',
		'LabelTotalVideoCount' => '',
		'LabelTryAgain' => 'erneut versuchen',
		'LabelUpdateToVersionX' => 'v%1$s',
		'LabelUseMailServer' => 'Verwende Mailserver',
		'LabelUsername' => 'Benutzername',
		'LabelVideosParentheses' => '(Videos)',
		'LabelVidSets' => '',
		'LabelViewImage' => '',
		'LabelViewImages' => '',
		'LabelViewIndexSlideshow' => '',
		'LabelViewModeDetail' => '',
		'LabelViewModeThumbnail' => '',
		'LabelViewSlideshow' => '',
		'LabelViewVideo' => '',
		'LabelViewVideos' => '',
		'LabelWidth' => 'Breite',
		'LabelXMLFile' => 'XML-Datei',
		'LabelXtoYofZ' => '%1$d bis %2$d von %3$d',
		
		'LabelRIGHT_ACCOUNT_EDIT' => '',
		'LabelRIGHT_ACCOUNT_LOGIN' => '',
		'LabelRIGHT_ACCOUNT_PASSWORD' => '',
		'LabelRIGHT_CACHE_CLEANUP' => '',
		'LabelRIGHT_CACHE_DELETE' => '',
		'LabelRIGHT_CONFIG_REWRITE' => '',
		'LabelRIGHT_EXPORT_CSV' => '',
		'LabelRIGHT_EXPORT_INDEX' => '',
		'LabelRIGHT_EXPORT_SFV' => '',
		'LabelRIGHT_EXPORT_VIDEO' => '',
		'LabelRIGHT_EXPORT_XML' => '',
		'LabelRIGHT_EXPORT_ZIP' => '',
		'LabelRIGHT_EXPORT_ZIP_MULTI' => '',
		'LabelRIGHT_IMAGE_ADD' => '',
		'LabelRIGHT_IMAGE_DELETE' => '',
		'LabelRIGHT_IMAGE_EDIT' => '',
		'LabelRIGHT_IMPORT_XML' => '',
		'LabelRIGHT_MODEL_ADD' => '',
		'LabelRIGHT_MODEL_DELETE' => '',
		'LabelRIGHT_MODEL_EDIT' => '',
		'LabelRIGHT_SEARCH' => 'Suchen',
		'LabelRIGHT_SEARCH_DIRTY' => '',
		'LabelRIGHT_SEARCH_TAGS' => '',
		'LabelRIGHT_SET_ADD' => '',
		'LabelRIGHT_SET_DELETE' => '',
		'LabelRIGHT_SET_EDIT' => '',
		'LabelRIGHT_TAG_ADD' => '',
		'LabelRIGHT_TAG_CLEANUP' => '',
		'LabelRIGHT_TAG_DELETE' => '',
		'LabelRIGHT_TAG_EDIT' => '',
		'LabelRIGHT_USER_ADD' => '',
		'LabelRIGHT_USER_DELETE' => '',
		'LabelRIGHT_USER_EDIT' => '',
		'LabelRIGHT_USER_RIGHTS' => '',
		'LabelRIGHT_VIDEO_ADD' => '',
		'LabelRIGHT_VIDEO_DELETE' => '',
		'LabelRIGHT_VIDEO_EDIT' => '',
		
		'ButtonCancel' => 'Abbrechen',
		'ButtonClean' => '',
		'ButtonClearCacheImage' => '',
		'ButtonClearCacheImages' => '',
		'ButtonClearIndexCacheImage' => '',
		'ButtonCreateNewTag' => '',
		'ButtonDelete' => 'L&ouml;schen',
		'ButtonDownload' => 'Herunterladen',
		'ButtonGenerate' => 'Generieren',
		'ButtonImportImages' => '',
		'ButtonImportVideos' => '',
		'ButtonImportXML' => 'XML-Datei importieren',
		'ButtonIndex' => '',
		'ButtonIndexSlideshow' => '',
		'ButtonLogin' => 'Anmelden',
		'ButtonNewImage' => '',
		'ButtonNewSet' => '',
		'ButtonNext' => 'Weiter',
		'ButtonNoThanks' => 'Nein danke',
		'ButtonPageFirst' => 'Erste Seite',
		'ButtonPageLast' => 'letzte Seite',
		'ButtonPageNext' => 'N&auml;chste Seite',
		'ButtonPagePrevious' => 'Vorherige Seite',
		'ButtonReset' => '',
		'ButtonReturn' => 'Zur&uuml;ck',
		'ButtonSave' => 'Speichern',
		'ButtonSearch' => 'Suchen',
		'ButtonSend' => '',
		'ButtonSetup' => 'Einrichten',
		'ButtonToggle' => '',
		'ButtonYesPleaseUpdate' => 'Ja, bitte!',

		'MessageAllDoneConfigWritten' => '',
		'MessageCacheImagesCleaned' => '',
		'MessageCDDBInfo' => "",
		'MessageConfigWritten' => '',
		'MessageDataseUpdated' => '',
		'MessageEnjoy' => 'Enjoy!',
		'MessageForgotYourPassword' => '',
		'MessageImagesImported' => '',
		'MessagePasswordEnterRepeat' => '',
		'MessagePasswordReset' => '',
		'MessagePasswordResetError' => '',
		'MessagePasswordResetSendError' => '',
		'MessagePasswordResetSuccess' => '',
		'MessageSureDeleteDate' => '',
		'MessageSureUpdateToX' => 'v%1$s',
		'MessageTagsCleaned' => '',
		'MessageVideosImported' => '',
		'MessageXMLImported' => ''
	);
}

?>