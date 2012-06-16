<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user/admin'),
    UserModule::t('Create'),
);

$this->menu = array(
    array('label' => UserModule::t('List Users'), 'url' => array('/user')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')),
    array('label' => UserModule::t('Create User')),
    array('label' => UserModule::t('Manage Profile Fields'), 'url' => array('/user/profileField')),
    array('label' => UserModule::t('Create Profile Field'), 'url' => array('/user/profileField/create')),
);
?>
<h1><?php echo UserModule::t("Create User"); ?></h1>

<?php
echo $this->renderPartial('_form', array('model' => $model, 'profile' => $profile));
?>