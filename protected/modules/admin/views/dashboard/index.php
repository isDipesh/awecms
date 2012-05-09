<?php
$this->breadcrumbs = array(
    AdminModule::t('Items') => array('/admin/dashboard/'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('dashboard-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
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
            'name' => 'enabled', // boolean model attribute (tinyint(1) with values 0 or 1)
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
//        array(
//            'name' => 'enabled',
//            'value' => '($data->enabled === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
//            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
//        ),
        array(
            'class' => 'CButtonColumnWithoutView',
        ),
    ),
));
?>