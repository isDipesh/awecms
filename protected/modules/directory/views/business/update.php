<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Directory') => array('/directory/business'),
    Yii::t('app', $model->title) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
//print_r($model);
//die();
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List All'), 'url' => array('/directory/business')),
        array('label' => Yii::t('app', 'Add New'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('manage')),
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/directory/categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/directory/categories/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
        array('label' => Yii::t('app', 'View'), 'url' => array('view', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Update')),
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $model->title; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>