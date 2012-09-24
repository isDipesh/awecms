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
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/directory/categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/directory/categories/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
    );
?>

<h1><?php echo Yii::t('app', 'Add New') . ' ' . Yii::t('app', 'Business'); ?></h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>