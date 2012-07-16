<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class path
{
	public $assets;
	public $base;
	public $original;
	public $images;
	public $thumbnails;
	public $tmp;
	public $cssTheme;

	public function __construct($galleryFolder, $dirs, $asset)
	{
		// /home/user/public_html/fbgallery/protected/extensions/fbgallery/assets
		$this->assets = $asset;

		// /home/user/public_html/fbgallery/
		$this->base = dirname(Yii::app()->request->scriptFile).'/';

		// /home/user/public_html/fbgallery/galleries/1
		$galleryFolder = $this->base.$galleryFolder;

		// /home/user/public_html/fbgallery/galleries/1/original/
		$this->original = $galleryFolder.$dirs['originalDir'].'/';

		// /home/user/public_html/fbgallery/galleries/1/pictures/
		$this->images = $galleryFolder.$dirs['picturesDir'].'/';

		// /home/user/public_html/fbgallery/galleries/1/thumbs/
		$this->thumbnails = $galleryFolder.$dirs['thumbsDir'].'/';

		// /home/user/public_html/fbgallery/galleries/1/_tmp/
		$this->tmp = $galleryFolder.$dirs['tempDir'].'/';

		// /home/matricks/public_html/fbgallery/assets/3423cc79/themes
		$this->cssTheme = realpath($this->base.'..'.Yii::app()->getAssetManager()->publish($asset).'/'.'themes');
	}
}
?>