<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Roles') => array('/role'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Manage Roles')),
        array('label' => Yii::t('app', 'Create New Role'), 'url' => array('/role/default/create')),
        array('label' => Yii::t('app', 'Manage Access Rules'), 'url' => array('/role/access')),
        array('label' => Yii::t('app', 'Create Access Rule'), 'url' => array('/role/access/create')),
    );
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Roles'); ?> </h1>

<?php
if (count($model->search()->data)) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'role-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'name',
            'description',
            array(
                'class' => 'JToggleColumn',
                'name' => 'active',
                'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                'model' => get_class($model),
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{update}{delete}'
            ),
        ),
    ));
} else {
    echo Yii::t('app', 'No results found!');
}