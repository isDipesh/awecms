<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Categories') => array('/directory/categories'),
    Yii::t('app', $model->title) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'View Category'), 'url' => array('view', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Update This Category')),
        array('label' => Yii::t('app', 'Delete This Category'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/directory/categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/directory/categories/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $model->title; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>