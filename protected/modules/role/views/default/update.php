<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Roles') => array('/role'),
    Yii::t('app', $model->name) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Manage Roles'), 'url' => array('/role')),
<<<<<<< HEAD
        array('label' => Yii::t('app', 'Create New Role'), 'url' => array('/role/default/create')),
=======
        array('label' => Yii::t('app', 'Create New Role'), 'url' => array('/role/create')),
>>>>>>> fixed MenuRenderer to handle items without role; fixed links on breadcrumbs and operations menu in role module
        array('label' => Yii::t('app', 'Manage Access Rules'), 'url' => array('/role/access')),
        array('label' => Yii::t('app', 'Create Access Rule'), 'url' => array('/role/access/create')),
        array('label' => Yii::t('app', 'Delete this role'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
            //array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
            //array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $model->name; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>