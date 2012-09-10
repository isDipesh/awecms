<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Gallery') => array('/gallery')
);
if (isset($model->album_id))
    $this->breadcrumbs[$model->album->page->title] = array('/gallery/album/view', 'id' => $model->album->id);

$this->breadcrumbs[0] = $model->title;

if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'View image')),
        array('label' => Yii::t('app', 'Update this image'), 'url' => array('/gallery/image/update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete this image'), 'url' => '#', 'linkOptions' => array('submit' => array('/gallery/image/delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'List all albums'), 'url' => array('/gallery/album')),
        array('label' => Yii::t('app', 'Create new album'), 'url' => array('/gallery/album/create')),
        array('label' => Yii::t('app', 'Manage all albums'), 'url' => array('/gallery/album/admin')),
        array('label' => Yii::t('app', 'All images'), 'url' => array('/gallery/image')),
        array('label' => Yii::t('app', 'Manage all images'), 'url' => array('/gallery/image/admin')),
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





