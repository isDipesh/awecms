<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Items') => array('/admin/dashboard'),
    Yii::t('app', 'Manage'),
);
?>
<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(1)); ?></h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'dashboard-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'category',
        'name',
        'path',
        array(
            'class' => 'JToggleColumn',
            'name' => 'enabled',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
        ),
    ),
));
?>