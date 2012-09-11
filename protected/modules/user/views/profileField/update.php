<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user/manage'),
    UserModule::t('Profile Fields') => array('manage'),
    $model->title => array('view', 'id' => $model->id),
    UserModule::t('Update'),
);
$this->menu = array(
    array('label' => UserModule::t('List Users'), 'url' => array('/user')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('/user/manage')),
    array('label' => UserModule::t('Create User'), 'url' => array('/user/manage/create')),
    array('label' => UserModule::t('Manage Profile Fields'), 'url' => array('/user/profileField')),
    array('label' => UserModule::t('Create Profile Field'), 'url' => array('/user/profileField/create')),
);
?>

<h1><?php echo UserModule::t('Update Profile Field ') . $model->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>