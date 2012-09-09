<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Albums') => array('index'),
    Yii::t('app', $model->page->title),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Edit this album'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Upload images'), 'url' => array('upload', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete this album'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'Create new album'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage all abums'), 'url' => array('admin')),
            /* array('label'=>Yii::t('app', 'List') , 'url'=>array('index')), */
    );
}
?>

<h1><?php echo $model->page->title; ?></h1>

<?php
if (isset($model->page->content))
    echo $model->page->content;
?>