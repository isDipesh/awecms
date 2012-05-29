<?php
$this->breadcrumbs = array(
    'Menus' => array('/' . $this->module->id),
    $model->menu->name => array('/' . $this->module->id . '/item/' . $model->menu->id),
    Yii::t('app', $model->name)
);
?>

<h1> <?php echo Yii::t('app', 'Edit'); ?> <?php echo $model->name; ?> </h1>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        )));

$this->renderPartial('_form', array(
    'model' => $model));
?>