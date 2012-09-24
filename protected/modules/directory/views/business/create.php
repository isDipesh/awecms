<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Directory') => array('/directory/business'),
    Yii::t('app', 'Add New'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List All'), 'url' => array('/directory/business')),
        array('label' => Yii::t('app', 'Add New')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('manage')),
    );
?>

<h1><?php echo Yii::t('app', 'Add New') . ' ' . Yii::t('app', 'Business'); ?></h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>