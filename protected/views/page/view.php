<?php
$this->breadcrumbs['Pages'] = array('index');$this->breadcrumbs[] = $model->_label;
if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
	array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
	/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo Yii::t('app', 'View');?> Page #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		array(
			'name'=>'user_id',
			'value'=>($model->user !== null)?CHtml::link($model->user->_label, array('/user/user/view','id'=>$model->user->id)).' '.CHtml::link(Yii::t('app','Update'), array('/user/user/update','id'=>$model->user->id), array('class'=>'edit')):'n/a',
			'type'=>'html',
		),
		'title',
		'content',
		'status',
		'created_at',
		'modified_at',
		array(
			'name'=>'parent',
			'value'=>($model->parent0 !== null)?CHtml::link($model->parent0->_label, array('/page/view','id'=>$model->parent0->id)).' '.CHtml::link(Yii::t('app','Update'), array('/page/update','id'=>$model->parent0->id), array('class'=>'edit')):'n/a',
			'type'=>'html',
			'value'=>($model->page !== null)?CHtml::link($model->page->_label, array('/page/view','id'=>$model->page->id)).' '.CHtml::link(Yii::t('app','Update'), array('/page/update','id'=>$model->page->id), array('class'=>'edit')):'n/a',
			'type'=>'html',
		),
		'order',
		'type',
		'comment_status',
		'tags_enabled',
		'permission',
		'password',
		'views',
),
	)); ?>


	<h2><?php echo CHtml::link(Yii::t('app','Page'), array('/page/admin'));?></h2>
<ul><?php $foreignobj = $model->page; 

					if ($foreignobj !== null) {
					echo '<li>';
					echo '#'.$model->page->id.' ';
					echo CHtml::link($model->page->_label, array('/page/view','id'=>$model->page->id));
							
					echo ' '.CHtml::link(Yii::t('app','Update'), array('/page/update','id'=>$model->page->id), array('class'=>'edit'));

					
					
					}
					?></ul><p><?php if($model->page === null) echo CHtml::link(
				Yii::t('app','Create'),
				array('/page/create', 'Page' => array('parent'=>$model->{$model->tableSchema->primaryKey}))
				);  ?></p><h2><?php echo CHtml::link(Yii::t('app','Zeros'), array('/zero/admin'));?></h2>
<ul>
			<?php if (is_array($model->zeros)) foreach($model->zeros as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->_label, array('/zero/view','id'=>$foreignobj->id));
							
					echo ' '.CHtml::link(Yii::t('app','Update'), array('/zero/update','id'=>$foreignobj->id), array('class'=>'edit'));

					}
						?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('/zero/create', 'Zero' => array('page_nm_zero(page_id, zero_id)'=>$model->{$model->tableSchema->primaryKey}))
				);  ?></p>