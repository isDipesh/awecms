<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Accesses') => array('index'),
    Yii::t('app', $model->module) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Manage Roles'), 'url' => array('/role')),
        array('label' => Yii::t('app', 'Create New Role'), 'url' => array('/role/create')),
        array('label' => Yii::t('app', 'Manage Access Rules'), 'url' => array('/role/access')),
        array('label' => Yii::t('app', 'Create Access Rule'), 'url' => array('/role/access/create')),
        array('label' => Yii::t('app', 'Delete this rule'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
            //array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
//array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update Access Rule'); ?></h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>