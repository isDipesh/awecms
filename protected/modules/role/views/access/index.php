<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Access Rules') => array('/role'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Manage Roles'), 'url' => array('/role')),
        array('label' => Yii::t('app', 'Create New Role'), 'url' => array('/role/create')),
        array('label' => Yii::t('app', 'Manage Access Rules')),
        array('label' => Yii::t('app', 'Create Access Rule'), 'url' => array('/role/access/create')),
    );
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Access Rules'); ?> </h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'access-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'module',
        'controller',
        'action',
        array(
            'class' => 'JToggleColumn',
            'name' => 'enabled',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}'
        ),
    ),
));
?>