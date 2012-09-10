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

<h1><?php echo $model->page->title; ?></h1>(<?php echo count($images) ?> images) 

<?php
if (isset($model->page->content))
    echo $model->page->content;
?>


<?php
foreach ($images as $image) {
    ?>
    <p>
        <a href="<?php echo Yii::app()->createUrl('/gallery/image/view', array('id' => $image->id)); ?>">
            <img width="100" height="100" src="<?php echo $image->url; ?>" alt="<?php echo $image->title; ?>">
        </a>
        <br/>
        <a href="<?php echo Yii::app()->createUrl('/gallery/image/view', array('id' => $image->id)); ?>">
            <b><?php echo $image->title; ?></b>
        </a>
        <br/>
        <?php echo $image->description; ?>
    </p>
    <?php
}
?>