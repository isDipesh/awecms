<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus') => array('/' . $this->module->id),
    Menu::model()->findByPk($menuId)->name => array('/' . $this->module->id . '/item?id=' . $menuId),
    Yii::t('app', 'Create New Item'),
);
$this->menu = array(
    array('label' => MenuModule::t('Manage Menus'), 'url' => array('/menu')),
    array('label' => MenuModule::t('Create New Menu'), 'url' => array('/menu/menu/create')),
);
?>

<h1> Create New Menu Item </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create',
    'menuId' => $menuId));
?>