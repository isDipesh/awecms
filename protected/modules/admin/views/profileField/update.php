<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Profile Fields') => array('/admin/profileField'),
    $model->title => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
?>

<h1><?php echo Yii::t('app', 'Update Profile Field ') . $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>