<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus')
);
$this->menu = array(
    array('label' => Yii::t('app', 'Create New'), 'url' => array('create')),
);
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Menus'); ?> </h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'menu-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
        'id',
        'name',
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'enabled',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'vertical',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'rtl',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'upward',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        'theme',
array(
			'class' => 'CButtonColumn',
                        'template' => '{update} {delete}'
		),
	),
)); ?>