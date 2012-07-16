<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class Uploader extends fbgallery
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	//return an array with languages which exists and can be used in plupload
	//to be used in cpanel
	public function getPluploaderLanguages()
	{
		$dir= realpath($this->path->base.'../'.$this->url->asset.'plupload/i18n').'/';
		$data = MyFiles::filesFromDir($dir, $ext="js", false, true);

		$langs = array('auto'=>'Auto');
		foreach($data as $lang)
			$langs[$lang] = $lang;
		return $langs;
	}

	//return maximum of files which can be uploaded in an album
	public function maxLenghtUploader()
	{
		if($this->conf->max != '-1')
		{
			$filesInGallery = count($this->imgsOrder);
			if($filesInGallery >= intval($this->conf->max))
				return intval('0');
			else
				return intval($this->conf->max) - $filesInGallery;
		}
		return $this->conf->max;
	}

	//when finish upload of files, we prepare its to be used in album
	public function doGallery()
	{
		self::pictureOrRemoveIt();
		self::resizeAllNew();
	}

	/** This method is called when all files are uploaded
	* Will remove any uploaded file which isn't a real picture type
	*/
	public function pictureOrRemoveIt()
	{
		$arrFiles = MyFiles::filesFromDir($this->path->tmp);
		foreach($arrFiles as $file){
			$file_info = getimagesize($this->path->tmp.$file);
			if(empty($file_info))
				MyFiles::deleteFile($this->path->tmp, $file);
		}
		return;
	}

	/** This method is called when all files are uploaded but after all non-pictures files was removed
	* Will resize all pictures from temporary folder
	* If keepOriginal is set to true, after resize, all files are moved to folder where we keep originals 
	* If keepOriginal is set to false, all pictures will be removed from temporary folder 
	*/
	public function resizeAllNew()
	{
		thumbnalize::thumb();

		if($this->conf->keepOriginal)
			MyFiles::moveAllFiles($this->path->tmp, $this->path->original);
		
		return MyFiles::emptyFolder($this->path->tmp);
	}

	//uploading files using plupload
	public function uploadFiles()
	{
		// HTTP headers for no cache etc
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		// $targetDir = $_REQUEST['target'];
		$targetDir = $this->path->tmp;

		$cleanupTargetDir = false; // Remove old files
		$maxFileAge = 60 * 60; // Temp file age in seconds

		// 5 minutes execution time
		@set_time_limit(5 * 60);

		//create structure of album if doesn't exists
		if(!file_exists($this->path->tmp))
			operations::createFoldersStructure();

		// get parameters
		$chunk = isset($_REQUEST["chunk"]) ? $_REQUEST["chunk"] : 0;
		$chunks = isset($_REQUEST["chunks"]) ? $_REQUEST["chunks"] : 0;
		$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

		// Clean the fileName for security reasons
		$fileName = MyFiles::cleanFileName($fileName);

		// remove old temporary files
		if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
			while (($file = readdir($dir)) !== false) {
				$filePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// Remove temp files if they are older than the max age
				if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $maxFileAge))
					@unlink($filePath);
			}

			closedir($dir);
		} else
			throw new CHttpException (501, Yii::t('app', "Failed to open temp directory."));

		// make sure the fileName is unique but only if chunking is disabled
		if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName))
			$fileName = MyFiles::uniqueFilename($targetDir, $fileName);

		// look for the content type header
		if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
			$contentType = $_SERVER["HTTP_CONTENT_TYPE"];

		if (isset($_SERVER["CONTENT_TYPE"]))
			$contentType = $_SERVER["CONTENT_TYPE"];

		// handle non multipart uploads older WebKit versions didn't support multipart in HTML5
		if (strpos($contentType, "multipart") !== false) {
			if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
				// Open temp file
				$out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
				if ($out) {
					// Read binary input stream and append it to temp file
					$in = fopen($_FILES['file']['tmp_name'], "rb");

					if ($in){
						while ($buff = fread($in, 4096))
							fwrite($out, $buff);
					} else
						throw new CHttpException (501, Yii::t('app', "Failed to open input stream."));

					fclose($in);
					fclose($out);
					@unlink($_FILES['file']['tmp_name']);
				} else
					throw new CHttpException (502, Yii::t('app', "Failed to open output stream."));
			} else
				throw new CHttpException (503, Yii::t('app', "Failed to move uploaded file."));
		} else {
			// Open temp file
			$out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
			if ($out) {
				// Read binary input stream and append it to temp file
				$in = fopen("php://input", "rb");

				if ($in){
					while ($buff = fread($in, 4096))
						fwrite($out, $buff);
				} else
					throw new CHttpException (501, Yii::t('app', "Failed to open input stream."));

				fclose($in);
				fclose($out);
			} else
				throw new CHttpException (502, Yii::t('app', "Failed to open output stream."));
		}

		if (intval($chunk) + 1 >= intval($chunks))
		{
			$file_name = $fileName;

			if (isset($_SERVER['HTTP_CONTENT_DISPOSITION'])) 
			{
				$array = array();
				preg_match('@^attachment; filename="([^"]+)"@',$_SERVER['HTTP_CONTENT_DISPOSITION'],$array);
				if (isset($array[1]))
					$file_name = $array[1];
			}
			//begin preparing of pictures to be added in album
			 self::doGallery();
		}
	}

}
?>