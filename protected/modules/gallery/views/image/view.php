<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Gallery') => array('/gallery')
);
if (isset($model->album_id))
    $this->breadcrumbs[$model->album->page->title] = array('/gallery/album/view', 'id' => $model->album->id);

$this->breadcrumbs[0] = $model->title;

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

<h1><?php echo $model->title; ?></h1>

<img src="<?php echo $model->url; ?>" alt="<?php echo $model->title; ?>">

<p>
    <?php echo $model->description; ?>
</p>

<p>
    <?php echo Yii::t('app', 'Type'); ?>:
    <?php echo $model->mime_type; ?>
    <br />
    <?php echo Yii::t('app', 'Size'); ?>:
    <?php echo $model->readableSize; ?>
</p>





