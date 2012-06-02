<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus') => array('/' . $this->module->id),
    Menu::model()->findByPk($menuId)->name => array('/' . $this->module->id . '/item/' . $menuId),
    Yii::t('app', 'Create New Item'),
);
?>

<h1> Create New Menu Item </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create',
    'menuId' => $menuId));
?>