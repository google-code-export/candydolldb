<?php
/* This file is part of CandyDollDB.

CandyDollDB is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

CandyDollDB is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with CandyDollDB. If not, see <http://www.gnu.org/licenses/>.
*/

include('cd.php');
ini_set('max_execution_time', '3600');
$CurrentUser = Authentication::Authenticate();

if(!$CurrentUser->hasPermission(RIGHT_CACHE_CLEANUP))
{
	$e = new Error(RIGHTS_ERR_USERNOTALLOWED);
	Error::AddError($e);
	HTMLstuff::RefererRedirect();
}

$FileToFind = '';
$CacheFolder = NULL;
$CacheImages = CacheImage::GetCacheImages();

if(isset($argv) && $argc > 0)
{ $CacheFolder = sprintf('%1$s/cache', dirname($_SERVER['PHP_SELF'])); }
else
{ $CacheFolder = 'cache'; }

/* @var $it RecursiveIteratorIterator */
$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(
	$CacheFolder,
	FileSystemIterator::SKIP_DOTS | FileSystemIterator::CURRENT_AS_FILEINFO
));

/* @var $file SplFileInfo */
foreach($it as $file)
{
	$idToFind = $file->getBasename('.jpg');
	$matches = array();

	if(preg_match_all('/^(?<Prefix>[MXSIV]-)?[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $idToFind, $matches) > 0)
	{ 
		$CacheImageInDB = CacheImage::GetCacheImages(
			new CacheImageSearchParameters(
				str_ireplace($matches['Prefix'], '', $idToFind)
			)
		);
	
		if(!$CacheImageInDB)
		{ unlink($file->getRealPath()); }
	}
}

/* @var $CacheImage CacheImage */
foreach($CacheImages as $CacheImage)
{
	$FileToFind = $CacheImage->getFilenameOnDisk();
	if(!file_exists($FileToFind))
	{ CacheImage::Delete($CacheImage, $CurrentUser); }
}

$infoSuccess = new Info($lang->g('MessageCacheImagesCleaned'));
Info::AddInfo($infoSuccess);
	
HTMLstuff::RefererRedirect();

?>
