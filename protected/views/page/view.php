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
                        'visible'=>Yii::app()->getModule('user')->isAdmin()
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
			'value'=>($model->parent !== null)?CHtml::link($model->parent->title, array('/page/view','id'=>$model->parent->id)).' ':'n/a',
			'type'=>'html',
			'value'=>($model->page !== null)?CHtml::link($model->page->title, array('/page/view','id'=>$model->page->id)).' ':'n/a',
			'type'=>'html',
		),
'order','type','comment_status',array(
                        'name'=>'tags_enabled',
                        'type'=>'boolean'
                    ),'permission',array(
                        'name'=>'password',
                        'visible'=>Yii::app()->getModule('user')->isAdmin()
                    ),'views',)));?><h2><?php echo CHtml::link(Yii::t('app','Page'), array('/page'));?></h2>
<ul><?php $foreignobj = $model->page; 

					if ($foreignobj !== null) {
					echo '<li>';
					echo '#'.$model->page->id.' ';
					echo CHtml::link($model->page->title, array('/page/view','id'=>$model->page->id));
							
					}
					?></ul><h2><?php echo CHtml::link(Yii::t('app','Zeros'), array('/zero'));?></h2>
<ul>
			<?php if (is_array($model->zeros)) foreach($model->zeros as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->name, array('/zero/view','id'=>$foreignobj->id));
							
					}
						?></ul>