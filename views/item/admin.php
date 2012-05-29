<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menu Items') => array('index'),
    Yii::t('app', 'Manage'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('menu-item-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Menu Items'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display: none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'menu-item-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
        'id',
        array(
                			'name' => 'menu_id',
                                        'value' => 'isset($data->menu->name)?$data->menu->name:"N/A"'
                ),
        array(
                			'name' => 'parent_id',
                                        'value' => 'isset($data->menuItem->name)?$data->menuItem->name:"N/A"'
                ),
        'name',
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'enabled',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        'content_id',
        'description',
        'link',
array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>