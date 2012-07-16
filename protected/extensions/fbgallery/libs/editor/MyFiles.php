<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/

abstract class MyFiles extends fbgallery
{
	public function cleanItemTitle($string)
	{
		$string = strip_tags($string);
		$string = htmlentities($string, ENT_COMPAT, "UTF-8");
		return $string;
	}

	public function cleanFileName($str)
	{
		//never accept comma (,) to be used in filename. 
		//It is used as separator when delete images from gallery
		return preg_replace("/[^\w\._]+/", "_", strtolower($str));
	}

	/**
	*Remove a file from a directory
	* @param string $dir - the directory name
	* @param string $file - the file name
	*/
	public function deleteFile($dir, $file)
	{
		$dfile = $dir.$file;
		if(file_exists($dfile))
			return unlink($dfile);
		return true;
	}

	/**
	 * Converts a class name into space-separated words.
	 * For example, 'PostTag' will be converted as 'Post Tag' or 'Post tag'.
	 * @param string name - the string to be converted
	 * @param boolean $ucwords - whether to capitalize the first letter in each word
	 * @param boolean $ucfirst - whether to capitalize only the first letter in first word
	 * if both $ucwords and $ucfirst are set to true, ucwords will be returned
	 * @return string - the resulting words
	*/
	public function class2name($name, $ucwords=true, $ucfirst=false)
	{
		$result=trim(strtolower(str_replace('_',' ',preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $name))));
		if($ucwords) return ucwords($result);
		if($ucfirst) return ucfirst($result);
		return $result;
	}

	/**
	* return string
	* Remove extension of a given file.
	* @param string $filename - the file name
	*/
	public function RemoveExtension($fileName) 
	{ 
		$ext = strrchr($fileName, '.'); 
		if($ext !== false)
			$fileName = substr($fileName, 0, -strlen($ext)); 
		return $fileName; 
	}

	/**
	*return an array with all files from a directory
	* @param string $dir - the directory name
	* @param string $ext - the file's extension type - default any file *
	* @param boolean $fullpath - false-return only filename, true-include fullpath
	* return array
	*/
	public function filesFromDir($dir, $ext="*", $fullpath=false, $noextension=false){
		$files = glob($dir . '*.'.$ext) ? glob($dir . '*.'.$ext) : array();
		if($fullpath)
			return $files;

		$arr = array();
		foreach($files as $file)
			$arr[] = $noextension ?  self::RemoveExtension(str_replace("$dir", "", $file)) : str_replace("$dir", "", $file);

		return $arr;
	}

	public function moveAllFiles($from, $to)
	{
		$files = MyFiles::filesFromDir($from);
		foreach($files as $file)
			if(!rename($from.$file, $to.$file))
				throw new Exception(Yii::t('app', 'Error: Couldn\'t move files! Please check permissions.'));
	}

	/**
	* Remove all content from a folder, but not folder itself
	* @param string $dirContainer - the folder name
	* return void
	*/
	public function emptyFolder($dirContainer){
		$dir = opendir( $dirContainer );
		while (false !== ($fname = readdir( $dir ))) {
			if(is_file($dirContainer."/".$fname)){ 
				unlink($dirContainer."/".$fname);
			}
		}
		closedir( $dir );
	}

	public function uniqueFilename($targetDir, $fileName){
		$ext = strrpos($fileName, '.');
		$fileName_a = substr($fileName, 0, $ext);
		$fileName_b = substr($fileName, $ext);

		$count = 1;
		while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
			$count++;

		$fileName = $fileName_a . '_' . $count . $fileName_b;

		return $fileName;
	}

	/**
	*Create a new folder with given permissions
	* @param string $newdir - the name for new folder
	* @param string $rights - permission to be set on folder - default 0777
	* return void
	*/
	public function NewFolder($newdir, $rights=0777)
	{
		$old_mask = umask(0);
		if(!file_exists($newdir))
		{
			if(!mkdir($newdir, $rights, true))
				return false;
			else
				return true;
		}else
			return true;
		
		umask($old_mask);
	}
	
	//return an array('name'=>name) with the names of all directories from a folder
	public function oneLevelDirsName($dir)
	{
		$arrFiles =array();
		$dirs = glob($dir. '/*', GLOB_ONLYDIR);
		if(count($dirs)>0){
			foreach($dirs as $dirPath){
				$p = explode('/', $dirPath);
				$name = $p[count($p)-1];
				$arrFiles[$name] = $name;
			}
		}
		return $arrFiles;
	}

	/**
	* Remove the directory and its content (all files and subdirectories) or if si empty is set to true, the folder is preserved.
	* @param string $dir the directory name
	* return void
	*/

	public function rrmdir($directory, $empty=FALSE)
	{
		if(substr($directory,-1) == DIRECTORY_SEPARATOR)
			$directory = substr($directory,0,-1);

		if(!file_exists($directory) || !is_dir($directory)) return false;

		elseif(is_readable($directory))
		{
			$handle = opendir($directory);

			while (false !== ($item = readdir($handle)))
			{
				if($item != '.' && $item != '..')
				{
					$path = $directory.DIRECTORY_SEPARATOR.$item;
					if(is_dir($path)) 
						self::rrmdir($path);
					else
						unlink($path);
				}
			}
			closedir($handle);

			if($empty == false)
				if(!rmdir($directory)) return false;
		}
		return true;
	}



}