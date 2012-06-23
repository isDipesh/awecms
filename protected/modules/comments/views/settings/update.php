<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Comments') => array('/comments'),
    Yii::t('app', 'Settings') => array('.'),
    Yii::t('app', 'Edit'),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo $model->model; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>