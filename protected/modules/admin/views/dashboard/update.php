<?php
$this->breadcrumbs = array(
    AdminModule::t('Items') => array('/admin/dashboard'),
    Yii::t('app', 'Update'),
);
$this->menu=array(
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo Yii::t('app', 'Edit') . ' ' . GxHtml::encode($model->label()) . ' - ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>