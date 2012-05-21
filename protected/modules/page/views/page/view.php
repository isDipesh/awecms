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
                        'name'=>'id', // only admin user can see person id
                        'label'=>'ID',
                        'visible'=>Yii::app()->getModule('user')->isAdmin()
                    ),'user_id','title',array(
                        'name'=>'content',
                        'type'=>'ntext'
                    ),'status','created_at','modified_at','parent','order','type','comment_status',array(
                        'name'=>'tags_enabled',
                        'type'=>'boolean'
                    ),'permission','password','views',)));
?>
