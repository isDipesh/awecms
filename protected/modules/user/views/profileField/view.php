<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user/manage'),
    UserModule::t('Profile Fields') => array('manage'),
    UserModule::t($model->title),
);
$this->menu = array(
    array('label' => UserModule::t('List Users'), 'url' => array('/user')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('/user/manage')),
    array('label' => UserModule::t('Create User'), 'url' => array('/user/manage/create')),
    array('label' => UserModule::t('Manage Profile Fields'), 'url' => array('/user/profileField')),
    array('label' => UserModule::t('Create Profile Field'), 'url' => array('/user/profileField/create')),
);
?>
<h1><?php echo UserModule::t('View Profile Field #') . $model->varname; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'varname',
        'title',
        'field_type',
        'field_size',
        'field_size_min',
        'required',
        'match',
        'range',
        'error_message',
        'other_validator',
        'widget',
        'widgetparams',
        'default',
        'position',
        'visible',
    ),
));
?>
