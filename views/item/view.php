<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menu Items') => array('index'),
    Yii::t('app', $model->name),
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

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
                        'name'=>'id',
                        'visible'=>Yii::app()->getModule('user')->isAdmin()
                    ),		array(
			'name'=>'menu_id',
			'value'=>($model->menu !== null)?CHtml::link($model->menu->name, array('/menu/menu/view','id'=>$model->menu->id)).' ':'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'parent_id',
			'value'=>($model->parent !== null)?CHtml::link($model->parent->name, array('/menu/menuItem/view','id'=>$model->parent->id)).' ':'n/a',
			'type'=>'html',
			'value'=>($model->menuItem !== null)?CHtml::link($model->menuItem->name, array('/menu/menuItem/view','id'=>$model->menuItem->id)).' ':'n/a',
			'type'=>'html',
		),
'depth','left','right','name',array(
                        'name'=>'enabled',
                        'type'=>'boolean'
                    ),'content_id','description',array(
                        'name'=>'link',
                        'type'=>'url'
                    ),)));?><h2><?php echo CHtml::link(Yii::t('app','MenuItem'), array('/menu/menuItem'));?></h2>
<ul><?php $foreignobj = $model->menuItem; 

					if ($foreignobj !== null) {
					echo '<li>';
					echo '#'.$model->menuItem->id.' ';
					echo CHtml::link($model->menuItem->name, array('/menu/menuItem/view','id'=>$model->menuItem->id));
							
					}
					?></ul>