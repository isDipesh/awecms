<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus') => array('/menu'),
    Yii::t('app', 'Create'),
);
$this->menu = array(
    array('label' => MenuModule::t('Manage Menus'), 'url' => array('/menu')),
    array('label' => MenuModule::t('Create New Menu')),
);
?>

<h1> Create New Menu </h1>
<?php
$this->renderPartial('_form', array(
            'model' => $model,
            'buttons' => 'create'));

?>