<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class url
{
	public $galleryFolder;
	public $asset;
	public $galleries;
	public $flags;
	public $activeThemeFolder;
	public $juiThemeUrl;

	public function __construct($gFolder, $pid, $cssTheme, $asset)
	{
		//http://localhost/fbgallery/
		$siteUrlBase = Yii::app()->request->hostInfo.Yii::app()->baseUrl.'/';

		//http://localhost/fbgallery/galleries/1
		$this->galleryFolder = $siteUrlBase.$gFolder.'/'.$pid;

		// /fbgallery/assets/3423cc79/
		$this->asset = Yii::app()->getAssetManager()->publish($asset).'/';

		//http://localhost/fbgallery/galleries/
		$this->galleries=$siteUrlBase.$gFolder.'/';

		// /fbgallery/assets/3423cc79/flag/
		$this->flags=$this->asset.'flag/';

		// /fbgallery/assets/b151f986/themes/simple/
		$this->activeThemeFolder = $this->asset.'themes/'.$cssTheme.'/';

		$this->juiThemeUrl = $this->asset.'juiTheme';
	}
}
?>