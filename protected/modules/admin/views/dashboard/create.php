<?php
$this->breadcrumbs = array(
    AdminModule::t('Items') => array('/admin/dashboard'),
    Yii::t('app', 'Add'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Add') . ' ' . GxHtml::encode($model->label() . ' Item'); ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>