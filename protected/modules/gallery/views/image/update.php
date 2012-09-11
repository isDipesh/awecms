<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Gallery') => array('/gallery')
);
if (isset($model->album_id))
    $this->breadcrumbs[$model->album->page->title] = array('/gallery/album/view', 'id' => $model->album->id);

$this->breadcrumbs[$model->title] = array('/gallery/image/view', 'id' => $model->id);

$this->breadcrumbs[1] = Yii::t('app', 'Update');


if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'View image'), 'url' => array('/gallery/image/view', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Update this image')),
        array('label' => Yii::t('app', 'Delete this image'), 'url' => '#', 'linkOptions' => array('submit' => array('/gallery/image/delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'List all albums'), 'url' => array('/gallery/album')),
        array('label' => Yii::t('app', 'Create new album'), 'url' => array('/gallery/album/create')),
        array('label' => Yii::t('app', 'Manage all albums'), 'url' => array('/gallery/album/manage')),
        array('label' => Yii::t('app', 'All images'), 'url' => array('/gallery/image')),
        array('label' => Yii::t('app', 'Manage all images'), 'url' => array('/gallery/image/manage')),
    );


if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
            //array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
            //array('label'=>Yii::t('app', 'Manage') , 'url'=>array('manage')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $model->title; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>