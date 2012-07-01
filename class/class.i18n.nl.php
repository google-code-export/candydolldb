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
		'ErrorUpdateTryAgain' => 'Er is een fout opgetreden tijdens het bijwerken, probeer het alstublieft <a href="%1$s">opnieuw</a>.',
		'ErrorSetupConnectDatabase' => 'Kon geen verbinding maken met de database-server, %1$s van database-gegevens.',
		'ErrorSetupCreatingUser' => 'Er is een fout opgetreden tijdens het aanmaken van de gebruiker (\'%2$s\'), %1$s.',
		'ErrorSetupWritingConfig' => 'Kon de instellingen niet wegschrijven. Controleer de bestandspermissies en %1$s.',
		'ErrorSetupAlreadyComplete' => 'De applicatie is al ingericht. Verwijder \'config.php\' en %1$s.',
		'ErrorSQLErrorTableNotExist' => 'De opgegeven tabel bestaat niet.',
		'ErrorSQLErrorUnknown' => 'Er is een onbekende SQL fout opgetreden.',
		'ErrorSyntaxEmailAddress' => 'Het opgegeven emailadres is niet geldig.',
		'ErrorSyntaxErrorUnknown' => 'Onkenede formaat-fout.',
		'ErrorUnknownError' => 'Onbekende fout.',
		'ErrorUploadErrorMaxFilesize' => 'Het bestand is groter dan toegestaan in MAX_FILE_SIZE.',
		'ErrorUploadErrorMaxFilesizeIni' => 'Het bestand is groter dan toegestaan in php.ini.',
		'ErrorUploadErrorMissingTempFolder' => 'De tijdelijke map voor het opslaan ontbreekt.',
		'ErrorUploadErrorNoFile' => 'Geen bestand geüpload.',
		'ErrorUploadErrorOK' => 'Er is geen fout opgetreden tijdens het uploaden.',
		'ErrorUploadErrorPartialUpload' => 'Het bestand is niet volledig opgeslagen.',
		'ErrorUploadErrorPHPExtension' => 'Een geïnstalleerde PHP extensie heeft het uploaden gestopt.',
		'ErrorUploadErrorUnknown' => 'Onbekende upload-fout.',
		'ErrorUploadErrorWriteToDisk' => 'Het bestand kon niet worden weggeschreven.',
		
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
		'LabelBirthdate' => 'Geboortedatum',
		'LabelBirthdateShort' => 'Geboren',
		'LabelBoth' => 'Allebei',
		'LabelChecksum' => 'Controlecijfer',
		'LabelClean' => 'Compleet',
		'LabelCleanCacheFolder' => 'De map met cache-bestanden en de cache-tabel opruimen.',
		'LabelContains' => 'Bevat',
		'LabelDate' => 'Datum',
		'LabelDates' => 'Data',
		'LabelDeleteDate' => 'Datum verwijderen',
		'LabelDeleteImage' => 'Foto verwijderen',
		'LabelDeleteModel' => 'Model verwijderen',
		'LabelDeleteSet' => 'Set verwijderen',
		'LabelDirty' => 'Incompleet',
		'LabelDownloadImage' => 'Download foto',
		'LabelDownloadImages' => 'Download foto\'s',
		'LabelDownloadIndex' => 'Een automatisch gegenereerde index downloaden van maximaal 1200x1800 pixels.',
		'LabelDownloadVideos' => 'Download video\'s',
		'LabelDownloadXML' => 'Een XML-bestand downloaden, gebaseerd op de eigen CandyDollDB-collectie.',
		'LabelEditModel' => 'Model bewerken',
		'LabelEditSet' => 'Set bewerken',
		'LabelEmailAddress' => 'E-mail adres',
		'LabelExtension' => 'Extensie',
		'LabelFilename' => 'Bestandsnaam',
		'LabelFilesize' => 'Grootte',
		'LabelFirstname' => 'Voornaam',
		'LabelHeight' => 'Hoogte',
		'LabelImagesParentheses' => '(foto\'s)',
		'LabelIncludeImages' => 'Inclusief foto\'s',
		'LabelIncludeTags' => 'Alleen met tags (foto\'s of video\'s)',
		'LabelIncludeVideos' => 'Inclusief video\'s',
		'LabelIndexOf' => 'Index van',
		'LabelInfo' => 'Info',
		'LabelLastname' => 'Achternaam',
		'LabelLastUpdated' => 'Laatste update',
		'LabelMissingFiles0' => 'Geen ontbrekende bestanden',
		'LabelMissingFiles1' => '1 ontbrekend bestand',
		'LabelMissingFilesX' => '%1$d ontbrekende bestanden',
		'LabelModel' => 'Model',
		'LabelMultiDownloadStep1' => 'Selecteer één of meer modellen, klik volgende.',
		'LabelMultiDownloadStep2' => 'Selecteer één of meer van de getoonde sets, klik volgende.',
		'LabelMultiDownloadStep3' => 'Selecteer één of meer van de getoonde foto\'s, klik Download.',
		'LabelMultiDownloadUseSubfolders' => 'Submappen in download',
		'LabelName' => 'Naam',
		'LabelNew' => 'Nieuw',
		'LabelNewPassword' => 'Nieuw wachtwoord',
		'LabelOrphanFiles0' => 'Geen loze bestanden',
		'LabelOrphanFiles1' => '1 loos bestand',
		'LabelOrphanFilesX' => '%1$d loze bestanden',
		'LabelPassword' => 'Wachtwoord',
		'LabelPicSets' => 'Foto-sets',
		'LabelPrefix' => 'Prefix',
		'LabelReEnter' => 'Opnieuw invoeren',
		'LabelRemarks' => 'Opmerkingen',
		'LabelRepeatPassword' => 'Wachtwoord herhalen',
		'LabelResultsPerPage' => 'per pagina',
		'LabelRevisitThisPage' => 'keer hier terug',
		'LabelSearchFor' => 'Zoeken naar',
		'LabelSetup' => 'Setup',
		'LabelShowingXResults' => '<p>%1$s resultaten</p>',
		'LabelStartDate' => 'Startdatum',
		'LabelTaggedWith' => 'tagged met',
		'LabelTags' => 'Tags',
		'LabelTitleMr' => 'Dhr.',
		'LabelTitleMrMrs' => 'Dhr./Mevr.',
		'LabelTitleMrs' => 'Mevr.',
		'LabelTotalImageCount' => 'Totaal aantal foto\'s',
		'LabelTotalModelCount' => 'Totaal aantal modellen',
		'LabelTotalSetCount' => 'Totaal aantal sets',
		'LabelTryAgain' => 'probeer opnieuw',
		'LabelUpdateToVersionX' => 'Bijwerken naar v%1$s',
		'LabelUsername' => 'Gebruikersnaam',
		'LabelVideosParentheses' => '(video\'s)',
		'LabelVidSets' => 'Video-sets',
		'LabelViewImage' => 'Foto bekijken',
		'LabelViewImages' => 'Foto\'s bekijken',
		'LabelViewIndexSlideshow' => 'Index-diashow bekijken',
		'LabelViewVideo' => 'Video bekijken',
		'LabelViewVideos' => 'Video\'s bekijken',
		'LabelViewSlideshow' => 'Diashow bekijken',
		'LabelWidth' => 'Breedte',
		'LabelXtoYofZ' => '%1$d t/m %2$d van %3$d',
		
		'ButtonCancel' => 'Annuleren',
		'ButtonClean' => 'Opruimen',
		'ButtonClearCacheImage' => 'Cachefoto verwijderen',
		'ButtonClearIndexCacheImage' => 'Index-cachefoto verwijderen',
		'ButtonDelete' => 'Verwijderen',
		'ButtonDownload' => 'Download',
		'ButtonImportImages' => 'Foto\'s importeren',
		'ButtonImportVideos' => 'Video\'s importeren',
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
		'ButtonYesPleaseUpdate' => 'Ja, graag',

		'MessageAllDoneConfigWritten' => 'Gelukt! Alle instellingen zijn weggeschreven in \'config.php\'. Verwijder de setup-pagina en <a href="login.php">meld u aan</a>.',
		'MessageForgotYourPassword' => 'Wachtwoord vergeten?',
		'MessageSureDeleteDate' => 'Weet u zeker dat u deze datum wil verwijderen?',
		'MessageCDDBInfo' => "<p>This application is a tribute to the breathtaking beauty of the models shown on <a href=\"http://www.candydoll.tv/\" rel=\"external\">CandyDoll.tv</a> (キャンディドール).</p><p>In CandyDoll's own words:</p>",
		'MessageDataseUpdated' => 'De database is bijgewerkt. Meld u alstublieft <a href="login.php">opnieuw aan</a>.',
		'MessageEnjoy' => 'Enjoy!',
		'MessagePasswordReset' => '<p>Vul uw gebruikersnaam en email-adres in en klik op \'Versturen\'. U ontvangt dan een hyperlink per e-mail met de mogelijkheid om het wachtwoord opnieuw in te stellen.</p>',
		'MessagePasswordEnterRepeat' => '<p>Vul een nieuw wachtwoord in, en bevestig datzelfde wachtwoord. Zodra het wachtwoord opnieuw is ingesteld, wordt u automatisch aangemeld.</p>',
		'MessagePasswordResetError' => '<p>De toegepaste hypelink is niet (meer) geldig.<br />Meld u alstublieft opnieuw aan.</p>',
		'MessagePasswordResetSuccess' => '<p>Er is een e-mail verstuurd met een hyperlink waarmee u het wachtwoord van uw account kunt herstellen.</p>',
		'MessagePasswordResetSendError' => '<p>Er is een fout opgetreden tijdens het versturen van uw e-mail. Neem contact op met de systeembeheerder.</p>',
		'MessageSureUpdateToX' => '<p>Weet u zeker dat u de applicatie wilt bijwerken naar v%1$s?</p>'
	);
}

?>