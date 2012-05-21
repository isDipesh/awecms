<?php
$this->breadcrumbs = array(
    UserModule::t('Profile Fields') => array('/admin/profileField'),
    Yii::t('app', 'Create'),
);
?>
<h1><?php echo UserModule::t('Create Profile Field'); ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>