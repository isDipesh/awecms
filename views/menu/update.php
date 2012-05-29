<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus') => array('index'),
    Yii::t('app', $model->name),
    Yii::t('app', 'Update'),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo $model->name; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>