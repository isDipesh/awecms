<?php

class KCFinder extends CInputWidget {

    public $filespath = 'uploads';
    public $filesurl;
    public $type = 'files'; //type = files, images, flash
    public $height = '389px';
    public $config;
    private $baseurl;

    public function init() {
        $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'source/kcfinder';
        $this->baseurl = Yii::app()->getAssetManager()->publish($dir);
        parent::init();
    }

    public function run() {
        ?>
        <iframe id="kc_frame" width="100%" height="100%" frameborder="0" src="<?php echo $this->baseurl . '/browse.php' . '?type=' . $this->type ?>" style="height: <?php echo $this->height; ?>;">
        <?php
        //require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'source/kcfinder/browse.php';
    }

}
?>