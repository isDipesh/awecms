<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Blocks') => array('index'),
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
$.fn.yiiGridView.update('block-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Blocks'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display: none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'block-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
        'id',
        'title',
        'content',
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'enabled',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'is_widget',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        'widget_class',
        'tag_name',
        'html_options',
        'decoration_css_class',
        'title_css_class',
        'content_css_class',
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'hide_on_empty',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        'skin',
array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>