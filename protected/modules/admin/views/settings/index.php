<?php

$this->breadcrumbs = array(
    'Settings',
    Yii::t('app', Awecms::generateFriendlyName($action)),
);


$this->menu = Admin::getSettings($action);

echo CHtml::link('Add settings field', array('/admin/settings/add/' . $action));
$this->widget('EDynamicForm', array('id' => 'id', 'class' => 'settings', 'model' => $settings, 'selector' => true));
?>
