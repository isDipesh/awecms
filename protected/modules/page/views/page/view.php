<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Pages') => array('index'),
    Yii::t('app', $model->title),
);if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
	array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
	/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
                        'name'=>'id',
                        'visible'=>Yii::app()->user->id=='admin'
                    ),		array(
			'name'=>'user_id',
			'value'=>($model->user !== null)?CHtml::link($model->user->username, array('/user/user/view','id'=>$model->user->id)).' ':'n/a',
			'type'=>'html',
		),
'title',array(
                        'name'=>'content',
                        'type'=>'ntext'
                    ),'status','created_at','modified_at',		array(
			'name'=>'parent_id',
			'value'=>($model->parent !== null)?CHtml::link($model->parent->title, array('/page/page/view','id'=>$model->parent->id)).' ':'n/a',
			'type'=>'html',
		),
'order','type','comment_status',array(
                        'name'=>'tags_enabled',
                        'type'=>'boolean'
                    ),'permission',array(
                        'name'=>'password',
                        'visible'=>Yii::app()->user->id=='admin'
                    ),'views',)));?><h2><?php echo CHtml::link(Yii::t('app','Pages'), array('/page/page'));?></h2>
<ul>
			<?php if (is_array($model->pages)) foreach($model->pages as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->title, array('/page/page/view','id'=>$foreignobj->id));
							
					}
						?></ul><h2><?php echo CHtml::link(Yii::t('app','Categories'), array('/category/category'));?></h2>
<ul>
			<?php if (is_array($model->categories)) foreach($model->categories as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->name, array('/category/category/view','id'=>$foreignobj->id));
							
					}
						?></ul>