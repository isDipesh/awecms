<?php 
Yii::app()->clientScript->registerCssFile(
		Yii::app()->getAssetManager()->publish(
			Yii::getPathOfAlias('YumAssets').'/css/yum.css'));

$module = Yii::app()->getModule('user');
$this->beginContent($module->baseLayout); ?>

<div id="usermenu">
<?php Yum::renderFlash(); ?>
<?php 
if(Yum::hasModule('messages')) {
	Yii::import('application.modules.messages.components.*');
	$this->widget('MessageWidget');
}
if(Yum::hasModule('profile')) {
	Yii::import('application.modules.profile.components.*');
	$this->widget('ProfileVisitWidget'); 
}
$this->renderMenu(); ?>

</div>

<div id="usercontent">
<?php echo $content;  ?>
</div>

<?php $this->endContent(); ?>
