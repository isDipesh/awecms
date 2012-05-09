<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('/admin/user'),
	UserModule::t('Create'),
);
?>
<h1><?php echo UserModule::t("Create User"); ?></h1>

<?php 
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>