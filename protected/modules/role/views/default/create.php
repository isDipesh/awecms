<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Roles') => array('/role'),
    Yii::t('app', 'Create'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Manage Roles'), 'url' => array('/role')),
        array('label' => Yii::t('app', 'Create New Role')),
        array('label' => Yii::t('app', 'Manage Access Rules'), 'url' => array('/role/access')),
        array('label' => Yii::t('app', 'Create Access Rule'), 'url' => array('/role/access/create')),
    );
?>

<h1> Create New Role </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>