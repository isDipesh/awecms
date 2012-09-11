<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user'),
    UserModule::t('Manage'),
);

$this->menu = array(
    array('label' => UserModule::t('List Users'), 'url' => array('/user')),
    array('label' => UserModule::t('Manage Users')),
    array('label' => UserModule::t('Create User'), 'url' => array('/user/admin/create')),
    array('label' => UserModule::t('Manage Profile Fields'), 'url' => array('/user/profileField')),
    array('label' => UserModule::t('Create Profile Field'), 'url' => array('/user/profileField/create')),
);
?>
<h1><?php echo UserModule::t("Manage Users"); ?></h1>

<p class="alert"><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>
<br/>
<?php
if (count($model->search()->data)) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'user-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'id',
                'type' => 'raw',
                'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
            ),
            array(
                'name' => 'username',
                'type' => 'raw',
                'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
            ),
            array(
                'name' => 'email',
                'type' => 'raw',
                'value' => 'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
            ),
            'create_at',
            'lastvisit_at',
            array(
                'name' => 'superuser',
                'value' => 'User::itemAlias("AdminStatus",$data->superuser)',
                'filter' => User::itemAlias("AdminStatus"),
            ),
            array(
                'name' => 'status',
                'value' => 'User::itemAlias("UserStatus",$data->status)',
                'filter' => User::itemAlias("UserStatus"),
            ),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
} else {
    echo "No results found!";
}
?>
