<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menu Items') => array('index'),
    Yii::t('app', $model->name) => array('view','id'=>$model->id),
    Yii::t('app', 'Update'),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo $model->name; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>