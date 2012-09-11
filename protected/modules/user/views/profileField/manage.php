<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user/manage'),
    UserModule::t('Profile Fields') => array('manage'),
    UserModule::t('Manage'),
);
$this->menu = array(
    array('label' => UserModule::t('List Users'), 'url' => array('/user')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('/user/manage')),
    array('label' => UserModule::t('Create User'), 'url' => array('/user/manage/create')),
    array('label' => UserModule::t('Manage Profile Fields')),
    array('label' => UserModule::t('Create Profile Field'), 'url' => array('/user/profileField/create')),
);
?>
<h1><?php echo UserModule::t('Manage Profile Fields'); ?></h1>

<p class="alert alert-notice"><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>



<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'varname',
            'type' => 'raw',
            'value' => 'UHtml::markSearch($data,"varname")',
        ),
        array(
            'name' => 'title',
            'value' => 'UserModule::t($data->title)',
        ),
        array(
            'name' => 'field_type',
            'value' => '$data->field_type',
            'filter' => ProfileField::itemAlias("field_type"),
        ),
        'field_size',
        //'field_size_min',
        array(
            'name' => 'required',
            'value' => 'ProfileField::itemAlias("required",$data->required)',
            'filter' => ProfileField::itemAlias("required"),
        ),
        //'match',
        //'range',
        //'error_message',
        //'other_validator',
        //'default',
        'position',
        array(
            'name' => 'visible',
            'value' => 'ProfileField::itemAlias("visible",$data->visible)',
            'filter' => ProfileField::itemAlias("visible"),
        ),
        //*/
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
