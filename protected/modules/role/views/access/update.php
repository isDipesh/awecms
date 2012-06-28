<?php
$moduleNameOnBreadcrumb = $model->module ? ucfirst($model->module) : 'None';
$this->breadcrumbs = array(
    Yii::t('app', 'Access Rules') => array('/role/access'),
    Yii::t('app', $moduleNameOnBreadcrumb),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Manage Roles'), 'url' => array('/role')),
        array('label' => Yii::t('app', 'Create New Role'), 'url' => array('/role/default/create')),
        array('label' => Yii::t('app', 'Manage Access Rules'), 'url' => array('/role/access')),
        array('label' => Yii::t('app', 'Create Access Rule'), 'url' => array('/role/access/create')),
        array('label' => Yii::t('app', 'Delete this rule'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update Access Rule'); ?></h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>