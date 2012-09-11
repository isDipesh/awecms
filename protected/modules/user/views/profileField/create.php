<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user/admin'),
    UserModule::t('Profile Fields') => array('admin'),
    UserModule::t('Create'),
);
$this->menu = array(
    array('label' => UserModule::t('List Users'), 'url' => array('/user')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')),
    array('label' => UserModule::t('Create User'), 'url' => array('/user/admin/create')),
    array('label' => UserModule::t('Manage Profile Fields'), 'url' => array('/user/profileField')),
    array('label' => UserModule::t('Create Profile Field')),
);
?>
<h1><?php echo UserModule::t('Create Profile Field'); ?></h1>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>