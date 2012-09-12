<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Categories') => array('/category'),
    Yii::t('app', 'Create'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/category')),
        array('label' => Yii::t('app', 'Create New Category')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/category/category/manage')),
    );
?>

<h1> Create New Category </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>