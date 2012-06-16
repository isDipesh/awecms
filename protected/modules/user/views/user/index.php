<?php
$this->breadcrumbs = array(
    UserModule::t("Users"),
);
if (UserModule::isAdmin()) {
    $this->menu = array(
        array('label' => UserModule::t('List Users')),
        array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')),
        array('label' => UserModule::t('Create User'), 'url' => array('/user/admin/create')),
        array('label' => UserModule::t('Manage Profile Fields'), 'url' => array('/user/profileField')),
        array('label' => UserModule::t('Create Profile Field'), 'url' => array('/user/profileField/create')),
    );
}
?>

<h1><?php echo UserModule::t("User List"); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        array(
            'name' => 'username',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
        ),
        'create_at',
        'lastvisit_at',
    ),
));
?>
