<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Pages') => array('index'),
    Yii::t('app', 'Create'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List'), 'url' => array('index')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
    );
?>

<h1> Create New Page </h1>
<?php
$this->renderPartial('_form', array(
    'buttons' => 'create'));
?>