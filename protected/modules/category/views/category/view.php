<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Categories') => array('/category'),
    Yii::t('app', $model->name),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
            /* array('label'=>Yii::t('app', 'List') , 'url'=>array('index')), */
    );
}
?>

<h1><?php echo $model->name; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'id',
            'visible' => Yii::app()->user->id == 'admin'
        ), 'name', 'description',)));
?><h2><?php echo CHtml::link(Yii::t('app', 'Pages'), array('/page/page')); ?></h2>
<ul>
    <?php
    if (is_array($model->pages))
        foreach ($model->pages as $foreignobj) {

            echo '<li>';
            echo CHtml::link($foreignobj->title, array('/page/page/view', 'id' => $foreignobj->id));
        }
    ?></ul>