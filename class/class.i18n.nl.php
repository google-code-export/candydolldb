<?php

class LabelsNL extends Labels
{
	public static function LabelExists($key){
		return array_key_exists($key, self::$Labels) && strlen(self::$Labels[$key]) > 0;
	}
	
	/**
	 * All user readable strings used in the application, in Dutch 
	 * @var array
	 */
	public static $Labels = array(
		'ErrorLoginErrorHyperlinkInvalid' => 'De gevolgde snelkoppeling is niet of niet langer geldig.',
		'ErrorLoginErrorPasswordIncorect' => 'Het wachtwoord is niet correct.',
		'ErrorLoginErrorPasswordsNotIdentical' => 'De wachtwoorden komen niet met elkaar overeen.',
		'ErrorLoginErrorUnknown' => 'Onbekende login-fout.',
		'ErrorLoginErrorUsernameEmailCombo' => 'De combinatie van gebruikersnaam en emailadres werd niet gevonden.',
		'ErrorLoginErrorUsernameNotFound' => 'De opgegeven gebruikersnaam werd niet gevonden.',
		'ErrorNotAllRequiredData' => 'Niet alle verplichte velden zijn ingevuld.',
		'ErrorPleaseUseWebInterfaceForSetup' => 'Maak alstublieft gebruik van de web-interface om deze applicatie in te richten.',
		'ErrorSetupAlreadyComplete' => 'De applicatie is al ingericht. Verwijder \'config.php\' en probeer het opnieuw.',
		'ErrorSetupConnectDatabase' => 'Kon geen verbinding maken met de database-server.',
		'ErrorSetupCreatingCacheDir' => 'Kon de cache-map niet vinden of aanmaken.',
		'ErrorSetupCreatingDatabase' => 'Kon de database niet aanmaken.',
		'ErrorSetupCreatingUser' => 'Er is een fout opgetreden tijdens het aanmaken van de gebruiker.',
		'ErrorSetupWritingConfig' => 'Kon de instellingen niet wegschrijven. Controleer de bestandspermissies.',
		'ErrorSQLErrorTableNotExist' => 'De opgegeven tabel bestaat niet.',
		'ErrorSQLErrorUnknown' => 'Er is een onbekende SQL fout opgetreden.',
		'ErrorSyntaxEmailAddress' => 'Het opgegeven emailadres is niet geldig.',
		'ErrorSyntaxErrorUnknown' => 'Onkenede formaat-fout.',
		'ErrorUnknownError' => 'Onbekende fout.',
		'ErrorUpdateTryAgain' => 'Er is een fout opgetreden tijdens het bijwerken, probeer het alstublieft opnieuw.',
		'ErrorUploadErrorMaxFilesize' => 'Het bestand is groter dan toegestaan in MAX_FILE_SIZE.',
		'ErrorUploadErrorMaxFilesizeIni' => 'Het bestand is groter dan toegestaan in php.ini.',
		'ErrorUploadErrorMissingTempFolder' => 'De tijdelijke map voor het opslaan ontbreekt.',
		'ErrorUploadErrorNoFile' => 'Geen bestand ge&uuml;pload.',
		'ErrorUploadErrorOK' => 'Er is geen fout opgetreden tijdens het uploaden.',
		'ErrorUploadErrorPartialUpload' => 'Het bestand is niet volledig opgeslagen.',
		'ErrorUploadErrorPHPExtension' => 'Een ge&iuml;nstalleerde PHP extensie heeft het uploaden gestopt.',
		'ErrorUploadErrorUnknown' => 'Onbekende upload-fout.',
		'ErrorUploadErrorWriteToDisk' => 'Het bestand kon niet worden weggeschreven.',
		'ErrorUserActionNotAllowed' => 'De uit te voeren actie is niet toegestaan.',
		'ErrorXMLErrorNotValidSchema' => 'Het ge&uuml;ploade bestand is geen valide CandyDollDB-XML.',
		'ErrorXMLErrorNotValidXML' => 'Het ge&uuml;ploade bestand is geen valide XML.',
		'ErrorXMLErrorUnknown' => 'Onbekende XML-fout.',
		
		'CLIFinished' => 'Finished.',
		'FooterBy' => 'door',
		'FooterLoggedInAs' => 'Aangemeld als',
		'FooterLastLogin' => 'Laatste bezoek',
		'FooterNever' => 'nooit',
		
		'NavigationAdminPanel' => 'Admin-pagina',
		'NavigationDirtySets' => 'Incomplete sets',
		'NavigationFeatures' => 'Onderdelen',
		'NavigationHome' => 'Home',
		'NavigationImage' => 'Foto',
		'NavigationImages' => 'Foto\'s',
		'NavigationImportXML' => 'XML importeren',
		'NavigationLogIn' => 'Aanmelden',
		'NavigationLogOut' => 'Afmelden',
		'NavigationManageTags' => 'Tags beheren',
		'NavigationModel' => 'Model',
		'NavigationModels' => 'Modellen',
		'NavigationMultiDownload' => 'Multi-download',
		'NavigationMyAccount' => 'Mijn account',
		'NavigationNewModel' => 'Nieuw model',
		'NavigationProcessXML' => 'XML verwerken',
		'NavigationResetYourPassword' => 'Wachtwoord herstellen',
		'NavigationSearch' => 'Zoeken',
		'NavigationSet' => 'Set',
		'NavigationSets' => 'Sets',
		'NavigationTagSearch' => 'Tags zoeken',
		'NavigationUsers' => 'Gebruikers',
		'NavigationVideo' => 'Video',
		'NavigationVideos' => 'Video\'s',
		
		'LabelAllModels' => 'Alle modellen',
		'LabelAutomatic' => 'Automatisch',
		'LabelBirthdate' => 'Geboortedatum',
		'LabelBirthdateShort' => 'Geboren',
		'LabelBoth' => 'Allebei',
		'LabelClean' => 'Compleet',
		'LabelCleanCacheFolder' => 'De map met cache-bestanden en de cache-tabel opruimen.',
		'LabelCleanUp' => 'Opruimen',
		'LabelCollection' => 'collectie',
		'LabelColorBoxClose' => 'Sluiten',
		'LabelColorBoxCurrent' => 'Foto {current} van {total}',
		'LabelColorBoxNext' => 'Volgende',
		'LabelColorBoxPrevious' => 'Vorige',
		'LabelCommandlineUser' => 'Shell gebruiker',
		'LabelComplete' => 'Compleet',
		'LabelConfiguration' => 'Configuratie',
		'LabelContains' => 'Bevat',
		'LabelDatabase' => 'Database',
		'LabelDatabaseName' => 'Databasenaam',
		'LabelDate' => 'Datum',
		'LabelDates' => 'Data',
		'LabelDeleteDate' => 'Datum verwijderen',
		'LabelDeleteImage' => 'Foto verwijderen',
		'LabelDeleteModel' => 'Model verwijderen',
		'LabelDeleteSelectedTag' => 'Geselecteerde tag verwijderen',
		'LabelDeleteSet' => 'Set verwijderen',
		'LabelDeleteUser' => 'Gebruiker verwijderen',
		'LabelDeleteVideo' => 'Video verwijderen',
		'LabelDirty' => 'Incompleet',
		'LabelDownloadImage' => 'Download foto',
		'LabelDownloadImages' => 'Download foto\'s',
		'LabelDownloadIndex' => 'Een automatisch gegenereerde index downloaden van maximaal 1200x1800 pixels.',
		'LabelDownloadSFV' => 'Een SFV-bestand downloaden, gebaseerd op de eigen CandyDollDB-collectie.',
		'LabelDownloadVideo' => 'Download video',
		'LabelDownloadVideos' => 'Download video\'s',
		'LabelDownloadXML' => 'Een XML-bestand downloaden, gebaseerd op de eigen CandyDollDB-collectie.',
		'LabelEditModel' => 'Model bewerken',
		'LabelEditSet' => 'Set bewerken',
		'LabelEmailAddress' => 'E-mail adres',
		'LabelExports' => 'Exports',
		'LabelExtension' => 'Extensie',
		'LabelFemale' => 'vrouw',
		'LabelFilename' => 'Bestandsnaam',
		'LabelFilesize' => 'Grootte',
		'LabelFirstAppearance' => 'Eerste set',
		'LabelFirstname' => 'Voornaam',
		'LabelFullName' => 'Volledige naam',
		'LabelGender' => 'Geslacht',
		'LabelHeight' => 'Hoogte',
		'LabelHostname' => 'Servernaam',
		'LabelImagesParentheses' => '(foto\'s)',
		'LabelIncludeImages' => 'Inclusief foto\'s',
		'LabelIncludePath' => 'Inclusief volledig pad',
		'LabelIncludeTags' => 'Alleen met tags (foto\'s of video\'s)',
		'LabelIncludeVideos' => 'Inclusief video\'s',
		'LabelIndexOf' => 'Index van',
		'LabelInfo' => 'Info',
		'LabelInsertion' => 'Tussenvoegsel',
		'LabelLanguage' => 'Taal',
		'LabelLanguage_de' => 'Duits',
		'LabelLanguage_en' => 'Engels',
		'LabelLanguage_nl' => 'Nederlands',
		'LabelLastActive' => 'Laatst aktief',
		'LabelLastAppearance' => 'Recentste set',
		'LabelLastLogin' => 'Laatste login',
		'LabelLastname' => 'Achternaam',
		'LabelLastUpdated' => 'Laatste update',
		'LabelMailServer' => 'Mailserver',
		'LabelMale' => 'man',
		'LabelMD5Checksum' => 'MD5-controlecijfer',
		'LabelMissingFiles0' => 'Geen ontbrekende bestanden',
		'LabelMissingFiles1' => '1 ontbrekend bestand',
		'LabelMissingFilesX' => '%1$d ontbrekende bestanden',
		'LabelModel' => 'Model',
		'LabelMultiDownloadStep1' => 'Selecteer &eacute;&eacute;n of meer modellen, klik volgende.',
		'LabelMultiDownloadStep2' => 'Selecteer &eacute;&eacute;n of meer van de getoonde sets, klik volgende.',
		'LabelMultiDownloadStep3' => 'Selecteer &eacute;&eacute;n of meer van de getoonde foto\'s, klik Download.',
		'LabelMultiDownloadUseSubfolders' => 'Submappen in download',
		'LabelName' => 'Naam',
		'LabelNew' => 'Nieuw',
		'LabelNewPassword' => 'Nieuw wachtwoord',
		'LabelNewUser' => 'Nieuwe gebruiker',
		'LabelNewVideo' => 'Nieuwe video',
		'LabelNotAllowed' => 'Niet toegestaan',
		'LabelOrphanFiles0' => 'Geen loze bestanden',
		'LabelOrphanFiles1' => '1 loos bestand',
		'LabelOrphanFilesX' => '%1$d loze bestanden',
		'LabelPassword' => 'Wachtwoord',
		'LabelPasswordGarbage' => 'w@cHtVVoOrD',
		'LabelPathOnDisk' => 'Pad op schijf',
		'LabelPathToCandyDollLinux' => '/pad/naar/candydoll',
		'LabelPathToCandyDollWin' => 'C:\\Pad\\Naar\\Candydoll',
		'LabelPicSets' => 'Foto-sets',
		'LabelPort' => 'Poort',
		'LabelPrefix' => 'Prefix',
		'LabelReEnter' => 'Opnieuw invoeren',
		'LabelRemarks' => 'Opmerkingen',
		'LabelRepeatPassword' => 'Wachtwoord herhalen',
		'LabelResultsPerPage' => 'per pagina',
		'LabelRevisitThisPage' => 'keer hier terug',
		'LabelSearchFor' => 'Zoeken naar',
		'LabelSelectDateFormat' => 'Gewenste datumformaat',
		'LabelSelectImageFormat' => 'Gewenst fotoformaat',
		'LabelSenderAddress' => 'Afzender (adres)',
		'LabelSenderName' => 'Afzender (naam)',
		'LabelSetCount' => 'Aantal sets',
		'LabelSetup' => 'Setup',
		'LabelSFVPathFull' => 'Volledige mapstructuur',
		'LabelSFVPathNone' => 'Zonder mapstructuur',
		'LabelSFVPathRelative' => 'Relatieve mapstructuur',
		'LabelShowingXResults' => '<p>%1$s resultaten</p>',
		'LabelSMTPAuth' => 'SMTP authenticatie',
		'LabelSorting' => 'Sortering',
		'LabelSortingASC' => 'Oplopend',
		'LabelSortingDESC' => 'Aflopend',
		'LabelStartDate' => 'Startdatum',
		'LabelSuffixDefault' => ' [standaard]',
		'LabelSystem' => 'Systeem',
		'LabelTagged' => 'Tagged',
		'LabelTaggedWith' => 'tagged met',
		'LabelTags' => 'Tags',
		'LabelThumbnails' => 'Thumbnails',
		'LabelThumbnailsPerPage' => 'Thumbnails per pagina',
		'LabelTitleMr' => 'Dhr.',
		'LabelTitleMrMrs' => 'Dhr./Mevr.',
		'LabelTitleMrs' => 'Mevr.',
		'LabelTotalImageCount' => 'Totaal aantal foto\'s',
		'LabelTotalModelCount' => 'Totaal aantal modellen',
		'LabelTotalSetCount' => 'Totaal aantal sets',
		'LabelTotalTagCount' => 'Totaal aantal tags',
		'LabelTotalUserCount' => 'Totaal aantal gebruikers',
		'LabelTotalVideoCount' => 'Totaal aantal video\'s',
		'LabelTryAgain' => 'probeer opnieuw',
		'LabelUpdateToVersionX' => 'Bijwerken naar v%1$s',
		'LabelUseMailServer' => 'Gebruik mailserver',
		'LabelUsername' => 'Gebruikersnaam',
		'LabelUserRights' => 'Rechten',
		'LabelVideosParentheses' => '(video\'s)',
		'LabelVidSets' => 'Video-sets',
		'LabelViewImage' => 'Foto bekijken',
		'LabelViewImages' => 'Foto\'s bekijken',
		'LabelViewIndexSlideshow' => 'Index-diashow bekijken',
		'LabelViewModeDetail' => 'Details',
		'LabelViewModeThumbnail' => 'Thumbnails',
		'LabelViewSlideshow' => 'Diashow bekijken',
		'LabelViewVideo' => 'Video bekijken',
		'LabelViewVideos' => 'Video\'s bekijken',
		'LabelWidth' => 'Breedte',
		'LabelXMLFile' => 'XML-bestand',
		'LabelXtoYofZ' => '%1$d t/m %2$d van %3$d',
		
		'LabelRIGHT_ACCOUNT_EDIT' => 'Account instellingen',
		'LabelRIGHT_ACCOUNT_LOGIN' => 'Aanmelden',
		'LabelRIGHT_ACCOUNT_PASSWORD' => 'Wachtwoord wijzigen',
		'LabelRIGHT_CACHE_CLEANUP' => 'Cache opruimen',
		'LabelRIGHT_CACHE_DELETE' => 'Cache-bestand verwijderen',
		'LabelRIGHT_CONFIG_REWRITE' => 'Configuratie wijzigen',
		'LabelRIGHT_EXPORT_CSV' => 'CSV exporteren',
		'LabelRIGHT_EXPORT_INDEX' => 'Download model-index',
		'LabelRIGHT_EXPORT_SFV' => 'SFV exporteren',
		'LabelRIGHT_EXPORT_VIDEO' => 'Downwload video',
		'LabelRIGHT_EXPORT_XML' => 'XML exporteren',
		'LabelRIGHT_EXPORT_ZIP' => 'Downloaden (zip)',
		'LabelRIGHT_EXPORT_ZIP_MULTI' => 'Multi-download (zip)',
		'LabelRIGHT_IMAGE_ADD' => 'Foto toevoegen',
		'LabelRIGHT_IMAGE_DELETE' => 'Foto verwijderen',
		'LabelRIGHT_IMAGE_EDIT' => 'Foto bewerken',
		'LabelRIGHT_IMPORT_XML' => 'XML importeren',
		'LabelRIGHT_MODEL_ADD' => 'Model toevoegen',
		'LabelRIGHT_MODEL_DELETE' => 'Model verwijderen',
		'LabelRIGHT_MODEL_EDIT' => 'Model bewerken',
		'LabelRIGHT_SEARCH' => 'Zoeken',
		'LabelRIGHT_SEARCH_DIRTY' => 'Incomplete sets zoeken',
		'LabelRIGHT_SEARCH_TAGS' => 'Tags zoeken',
		'LabelRIGHT_SET_ADD' => 'Set toevoegen',
		'LabelRIGHT_SET_DELETE' => 'Set verwijderen',
		'LabelRIGHT_SET_EDIT' => 'Set bewerken',
		'LabelRIGHT_TAG_ADD' => 'Tag aanmaken',
		'LabelRIGHT_TAG_CLEANUP' => 'Tags opruimen',
		'LabelRIGHT_TAG_DELETE' => 'Tag verwijderen',
		'LabelRIGHT_TAG_EDIT' => 'Tag bewerken',
		'LabelRIGHT_USER_ADD' => 'Gebruiker aanmaken',
		'LabelRIGHT_USER_DELETE' => 'Gebruiker verwijderen',
		'LabelRIGHT_USER_EDIT' => 'Gebruiker bewerken',
		'LabelRIGHT_USER_RIGHTS' => 'Gebruiker rechtenbeheer',
		'LabelRIGHT_VIDEO_ADD' => 'Video aanmaken',
		'LabelRIGHT_VIDEO_DELETE' => 'Video verwijderen',
		'LabelRIGHT_VIDEO_EDIT' => 'Video bewerken',
		
		'ButtonCancel' => 'Annuleren',
		'ButtonClean' => 'Opruimen',
		'ButtonClearCacheImage' => 'Cachefoto verwijderen',
		'ButtonClearCacheImages' => 'Cachefoto\'s verwijderen',
		'ButtonClearIndexCacheImage' => 'Index-cachefoto verwijderen',
		'ButtonCreateNewTag' => 'Nieuwe tag',
		'ButtonDelete' => 'Verwijderen',
		'ButtonDownload' => 'Download',
		'ButtonGenerate' => 'Genereren',
		'ButtonImportImages' => 'Foto\'s importeren',
		'ButtonImportVideos' => 'Video\'s importeren',
		'ButtonImportXML' => 'XML importeren',
		'ButtonIndex' => 'Index',
		'ButtonIndexSlideshow' => 'Index diashow',
		'ButtonLogin' => 'Aanmelden',
		'ButtonNewImage' => 'Nieuwe foto',
		'ButtonNewSet' => 'Nieuw set',
		'ButtonNext' => 'Volgende',
		'ButtonNoThanks' => 'Nee bedankt',
		'ButtonPageFirst' => 'Eerste pagina',
		'ButtonPageLast' => 'Laatste pagina',
		'ButtonPageNext' => 'Volgende pagina',
		'ButtonPagePrevious' => 'Vorige pagina',
		'ButtonReset' => 'Herstellen',
		'ButtonReturn' => 'Terug',
		'ButtonSave' => 'Opslaan',
		'ButtonSearch' => 'Zoeken',
		'ButtonSend' => 'Versturen',
		'ButtonSetup' => 'Setup',
		'ButtonToggle' => 'Selectie omkeren',
		'ButtonYesPleaseUpdate' => 'Ja, graag',

		'MessageAllDoneConfigWritten' => 'Gelukt! Alle instellingen zijn weggeschreven in \'config.php\'. Verwijder de setup-pagina en meld u daarna aan.',
		'MessageCacheImagesCleaned' => 'Zowel de cache-map als -tabel zijn opgeruimd.',
		'MessageCDDBInfo' => "<p>This application is a tribute to the breathtaking beauty of the models shown on <a href=\"http://www.candydoll.tv/\" rel=\"external\">CandyDoll.tv</a> (キャンディドール).</p><p>In CandyDoll's own words:</p>",
		'MessageConfigWritten' => 'Configuratie succesvol weggeschreven naar \'config.php\'.',
		'MessageDataseUpdated' => 'De database is bijgewerkt. Verwijder de setup-bestanden en meld u opnieuw aan.',
		'MessageEnjoy' => 'Enjoy!',
		'MessageForgotYourPassword' => 'Wachtwoord vergeten?',
		'MessageImagesImported' => 'De foto\'s zijn succesvol ge&iuml;mporteerd.',
		'MessagePasswordEnterRepeat' => '<p>Vul een nieuw wachtwoord in, en bevestig datzelfde wachtwoord. Zodra het wachtwoord opnieuw is ingesteld, wordt u automatisch aangemeld.</p>',
		'MessagePasswordReset' => '<p>Vul uw gebruikersnaam en email-adres in en klik op \'Versturen\'. U ontvangt dan een hyperlink per e-mail met de mogelijkheid om het wachtwoord opnieuw in te stellen.</p>',
		'MessagePasswordResetError' => '<p>De toegepaste hypelink is niet (meer) geldig.<br />Meld u alstublieft opnieuw aan.</p>',
		'MessagePasswordResetSendError' => '<p>Er is een fout opgetreden tijdens het versturen van uw e-mail. Neem contact op met de systeembeheerder.</p>',
		'MessagePasswordResetSuccess' => '<p>Er is een e-mail verstuurd met een hyperlink waarmee u het wachtwoord van uw account kunt herstellen.</p>',
		'MessageSureDeleteDate' => 'Weet u zeker dat u deze datum wil verwijderen?',
		'MessageSureUpdateToX' => '<p>Weet u zeker dat u de applicatie wilt bijwerken naar v%1$s?</p>',
		'MessageTagsCleaned' => 'De verzameling Tags is opgeruimd.',
		'MessageVideosImported' => 'De video\'s zijn succesvol ge&iuml;mporteerd.',
		'MessageXMLImported' => 'Het XML bestand is succesvol ge&iuml;mporteerd.'
	);
}

?>