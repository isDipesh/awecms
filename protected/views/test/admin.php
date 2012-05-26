<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Tests') => array('index'),
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
$.fn.yiiGridView.update('test-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Tests'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display: none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'test-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
        'id',
        'name',
        'birthdate',
        'birthtime',
        array(
                                        'class' => 'JToggleColumn',
					'name' => 'enabled',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                                        'model' => get_class($model),
                                        'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
					),
        'status',
        'slogan',
        'content',
        'created_at',
        'changed_at',
        'modified_at',
        'image',
        'email',
        'uri',
        'qualification',
array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>