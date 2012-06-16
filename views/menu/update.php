<?php
$this->breadcrumbs = array(
    Yii::t('app', MenuModule::t('Menu')) => array('/menu'),
    Yii::t('app', $model->name),
    Yii::t('app', MenuModule::t('Settings')),
);
$this->menu = array(
    array('label' => MenuModule::t('Manage Menus'), 'url' => array('/menu')),
    array('label' => MenuModule::t('Create New Menu'), 'url' => array('/menu/menu/create')),
);
?>

<h1> <?php echo $model->name . MenuModule::t(' Menu Settings'); ?></h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>