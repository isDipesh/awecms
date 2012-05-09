<?php
$this->breadcrumbs = array(
    UserModule::t('Profile Fields') => array('/admin/profileField'),
    $model->title => array('view', 'id' => $model->id),
    UserModule::t('Update'),
);
?>

<h1><?php echo UserModule::t('Update ProfileField ') . $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>