<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/

//used to simplify use of configuration setting
//to use a setting, will call it like $this->conf->settingName
class conf
{
	public function __construct()
	{
		$galleryConfig = unserialize(GalleryConfig::model()->find(array('condition'=>"type='gallery'"))->config);
		$albumConfig = unserialize(GalleryConfig::model()->find(array('condition'=>"type='album'"))->config);
		$collectionConfig = unserialize(GalleryConfig::model()->find(array('condition'=>"type='collection'"))->config);
		$fancyBoxConfig = unserialize(GalleryConfig::model()->find(array('condition'=>"type='fancybox'"))->config);
		$uploaderConfig = unserialize(GalleryConfig::model()->find(array('condition'=>"type='uploader'"))->config);

		$configs = array_merge($galleryConfig, $albumConfig, $collectionConfig, $fancyBoxConfig, $uploaderConfig);

		foreach($configs as $config => $value)
			$this->$config = $value;
	}
}
?>