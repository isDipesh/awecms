<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class FBAdmin
{
	public function loadDefaultConfig()
	{
		$type = $_POST['loadDefaultConfig'];
		switch($type)
		{
			case 'Gallery':$config = serialize(Cfg::defaultGalleryConfig());break;
			case 'Album':$config = serialize(Cfg::defaultAlbumConfig());break;
			case 'Collection':$config = serialize(Cfg::defaultCollectionConfig());break;
			case 'FancyBox':$config = serialize(Cfg::defaultFancyBoxConfig());break;
			case 'Uploader':$config = serialize(Cfg::defaultUploaderConfig());break;
			case 'All':self::loadAllDefaultConfig();break;
		}

		$record = GalleryConfig::model()->find(array('condition'=>"type='$type'"));
		$attributes = array("config"=>$config);
		$record->saveAttributes($attributes);
		$this->owner->refresh();
	}

	private function loadAllDefaultConfig()
	{
		$arr = array(
			'Gallery' => serialize(Cfg::defaultGalleryConfig()),
			'Album'=> serialize(Cfg::defaultAlbumConfig()),
			'Collection' => serialize(Cfg::defaultCollectionConfig()),
			'FancyBox'=>serialize(Cfg::defaultFancyBoxConfig()),
			'Uploader'=>serialize(Cfg::defaultUploaderConfig())
		);
		foreach($arr as $type => $config)
		{
			$record = GalleryConfig::model()->find(array('condition'=>"type='$type'"));
			$attributes = array("config"=>$config);
			$record->saveAttributes($attributes);
		}
		$this->owner->refresh();
	}


	public function updateGalleryConfig()
	{
		if(isset($_POST['Cfg']['predefinedTitle']))
			$_POST['Cfg']['predefinedTitle'] = operations::purifiedTtext($_POST['Cfg']['predefinedTitle']);

		$type= $_POST['scenario'];
		$model = new Cfg($type);
		$model->attributes = $_POST['Cfg'];
		if($model->validate())
		{
			$record = GalleryConfig::model()->find(array('condition'=>"type='$type'"));
			$attributes = array("config"=> serialize($_POST['Cfg']));
			$record->saveAttributes($attributes);
			Yii::app()->user->setFlash('succes',$this->tr('successUpdate'));
		}else
			Yii::app()->user->setFlash('error', $this->tr('errorUpdate'));
	}

	//get informations for default values in cpanel
	public function getDefaultValue($type, $setting)
	{
		switch($type)
		{
			case('gallery'):
				$f=Cfg::defaultGalleryConfig();
			break;
			case('album'):
				$f=Cfg::defaultAlbumConfig();
			break;
			case('collection'):
				$f=Cfg::defaultCollectionConfig();
			break;
			case('fancybox'):
				$f=Cfg::defaultFancyBoxConfig();
			break;
			case('uploader'):
				$f=Cfg::defaultUploaderConfig();
			break;
		}
		return CHtml::tag(
			'div', 
			array(
				'class'=>'fbLoadDefault sttip', 
				'data-default'=>$f[$setting],
				'title'=>$this->tr('clickLoadDefault') 
			), '');
	}

	public function helpTooltip($setting)
	{
		$h=Cfg::attributeLabels();
		$help = $h[$setting.'Help'] ? $h[$setting.'Help'] : $this->tr('noHelp').'<strong>'.$h[$setting].'</strong>'; 
		return CHtml::tag('div', array("class"=>"fbSettingHelp sttip", "title"=>"$help", '')).CHtml::closeTag('div');
	}

	public function publishAdmin()
	{
		$baseUrl = Yii::app()->assetManager->publish(dirname(__FILE__).'/../../assets');
		Yii::app()->clientScript->registerScriptFile($baseUrl .'/administration.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScript('startAdmin', "administration()",CClientScript::POS_READY);
	}
}

?>