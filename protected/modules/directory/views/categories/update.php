<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Categories') => array('index'),
    Yii::t('app', $model->id) => array('view','id'=>$model->id),
    Yii::t('app', 'Update'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
        array('label'=>Yii::t('app', 'View') , 'url'=>array('view', 'id'=>$model->id)),
        array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
        array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
        array('label'=>Yii::t('app', 'Manage') , 'url'=>array('manage')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo $model->id; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>