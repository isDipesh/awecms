<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'author0',
			'type' => 'raw',
			'value' => $model->author0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->author0)), array('users/view', 'id' => GxActiveRecord::extractPkValue($model->author0, true))) : null,
			),
'title',
'content',
'excerpt',
'status',
'created_at',
'modified_at',
array(
			'name' => 'parent0',
			'type' => 'raw',
			'value' => $model->parent0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->parent0)), array('page/view', 'id' => GxActiveRecord::extractPkValue($model->parent0, true))) : null,
			),
'order',
'type',
'comment_status',
'permission',
'password',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('pages')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->pages as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('page/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>