<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus') => array('index'),
    Yii::t('app', $model->name),
    Yii::t('app', 'Update'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo $model->name. ' Menu'; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>