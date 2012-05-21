<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Users')=>array('/admin/user'),
    $model->username => array('view', 'id' => $model->id),
    (Yii::t('app', 'Update')),
);
?>

<h1><?php echo Yii::t('app', 'Update User') . " " . $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'profile' => $profile)); ?>