<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Blocks') => array('/block'),
    Yii::t('app', $model->title),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Update block')),
        array('label' => Yii::t('app', 'Delete this block'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'Manage blocks'), 'url' => array('/block/block')),
        array('label' => Yii::t('app', 'Create new block'), 'url' => array('/block/block/create')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $model->title; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>