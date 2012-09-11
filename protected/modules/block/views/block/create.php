<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Blocks') => array('/block'),
    Yii::t('app', 'Create'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Manage blocks'), 'url' => array('/block/block')),
        array('label' => Yii::t('app', 'Create new block')),
    );
?>

<h1> Create New Block </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>