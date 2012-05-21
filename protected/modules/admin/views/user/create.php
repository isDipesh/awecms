<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Users')=>array('/admin/user'),
	Yii::t('app', 'Create'),
);
?>
<h1><?php echo Yii::t('app', 'Create User'); ?></h1>

<?php 
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>