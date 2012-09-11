<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Categories') => array('/category'),
    Yii::t('app', $model->name) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'View Category'), 'url' => array('view', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Update This Category')),
        array('label' => Yii::t('app', 'Delete This Category'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/category')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/category/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/category/manage')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $model->name; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>