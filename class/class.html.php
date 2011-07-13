<?php

class HTMLstuff
{
	/**
	 * Generate a HTML header, containing DOCTYPE, head- and meta-tags, JavaScript-includes and title.
	 * @param string $Title
	 * @param User $CurrentUser
	 * @return string
	 */
	public static function HtmlHeader($Title = null, $CurrentUser = null)
	{
		return sprintf("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
		<html xmlns=\"http://www.w3.org/1999/xhtml\">

		<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
		<meta name=\"language\" content=\"en-US\" />
		
		<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" title=\"CandyDoll DB\" />
		<link rel=\"shortcut icon\" href=\"favicon.ico\" />
		<link rel=\"icon\" href=\"favicon.ico\" />
		
		<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery.min.js\"></script>
		<script type=\"text/javascript\" src=\"js/fwiep.js\"></script>
		<title>CandyDoll DB%1\$s</title>
		</head>

		<body>

		<div id=\"Container\">
		<div id=\"Header\"%3\$s>

		<h1>CandyDoll DB%1\$s</h1>
		<p>by <a href=\"http://www.fwiep.nl/\" rel=\"external\" title=\"FWieP\">FWieP</a></p>
		%4\$s
		<div class=\"AbsolutePoint\">
		%2\$s
		</div>
		
		</div>

		<div id=\"Content\">",
		
		$Title ? ' :: '.htmlentities($Title) : null,
		
		$CurrentUser != null ? sprintf(
			"<div class=\"LoginStats\">
			Logged in as <a href=\"user_view.php?user_id=%3\$d\"><strong>%1\$s</strong></a>.<br />Last login: %2\$s &gt;&zwnj;<a href=\"logout.php\"><strong>Log&nbsp;out</strong></a>&zwnj;&lt;
			</div>",
			htmlentities($CurrentUser->getUserName()),
			$CurrentUser->getPreLastLogin() > 0 ? date('j F Y @ G:i', $CurrentUser->getPreLastLogin()) : 'never',
			$CurrentUser->getID()
		) : null,
		
		$CurrentUser == null ? ' style="background-position:230px 0;"' : null,
		
		Error::GenerateErrorList()
		);
	}
	
	/**
	 * Generate a HTML footer, corresponding to this class' HTML-header function.
	 * @return string
	 */
	public static function HtmlFooter()
	{
		return sprintf("
		</div>

		</div>

		</body>
		</html>");
	}
	
	/**
	 * Generate a hyperlink pointing to the given URL, or index.php.  
	 * @param string $URL
	 * @param string $ButtonText
	 * @param string $CustomAttributes
	 * @return string
	 */
	public static function Button($URL = null, $ButtonText = null, $CustomAttributes = null)
	{
		return sprintf(
			"<a href=\"%1\$s\" class=\"Button\"%3\$s>%2\$s</a>",
		 	$URL ? $URL : (array_key_exists('HTTP_REFERER', $_SERVER) ? $_SERVER['HTTP_REFERER'] : 'index.php'),
			$ButtonText ? htmlentities($ButtonText) : 'Home',
			$CustomAttributes ? $CustomAttributes : null 
		);
	}
	/**
	 * Generates a JavaScript-snippet which shows a nice loading animation while an image loads.
	 * @param string $url
	 * @param int $width
	 * @param int $height
	 * @param string $title
	 * @param string $alt
	 * @return string
	 */
	public static function ImageLoading($url, $width = 400, $height = 600, $title = '', $alt = '')
	{
		$template = <<<HfuheuhUHfuh3e83uhfuhdfu3
		<script type="text/javascript">
		//<![CDATA[
		
			$(document).ready(function(){
				var img = new Image();
				$(img).load(function(){
					$(this).hide();
					$('.Loading').removeClass('Loading').append(this);
					$(this).fadeIn();
				}).attr({
					width : %2\$d,
					height : %3\$d,
					title : '%4\$s',
					alt : '%5\$s',
					src : '%1\$s'
				});
			});
		           
		//]]>
		</script>
HfuheuhUHfuh3e83uhfuhdfu3;

		return sprintf($template, $url, $width, $height, $title, $alt);
	}
	
	public static function DisabledStr($InBool)
	{
		return $InBool ? ' disabled="disabled"' : '';
	}
	
	public static function CheckedStr($InBool)
	{
		return $InBool ? ' checked="checked"' : '';
	}
	
	public static function RefererRedirect($RedirURL = 'index.php')
	{
		if(array_key_exists('HTTP_REFERER', $_SERVER))
		{ header('location:'.$_SERVER['HTTP_REFERER']); }
		else
		{ header('location:'.$RedirURL); }	
	}
}

?>