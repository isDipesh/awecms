<?php

$this->breadcrumbs = array(
    'Settings',
    Yii::t('app', Awecms::generateFriendlyName($action)),
);

$this->menu = Settings::getCategoriesAsLinks($action);

echo CHtml::link('Add settings field', array('/settings/add/' . $action));
$this->widget('EDynamicForm', array('id' => 'id', 'class' => 'settings', 'model' => $settings, 'selector' => false));
?>
