<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('index')),
);
?>

<h1><?php echo Yii::t('app', 'Edit') . ' ' . GxHtml::encode($model->label()) . ' - ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>