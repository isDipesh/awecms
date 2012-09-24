<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Categories') => array('/directory/categories'),
    Yii::t('app', 'Create'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List All'), 'url' => array('/directory/business')),
        array('label' => Yii::t('app', 'Add New'), 'url' => array('/directory/business/create')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('/directory/business/manage')),
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/directory/categories')),
        array('label' => Yii::t('app', 'Create New Category')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
    );
?>

<h1><?php echo Yii::t('app', 'Create New') . ' ' . Yii::t('app', 'Business Category'); ?></h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>