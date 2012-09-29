<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Albums') => array('/gallery'),
    Yii::t('app', $model->page->title),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'View album')),
        array('label' => Yii::t('app', 'Edit this album'), 'url' => array('/gallery/album/update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Upload images'), 'url' => array('/gallery/album/upload', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete this album'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'List all albums'), 'url' => array('/gallery/album')),
        array('label' => Yii::t('app', 'Create new album'), 'url' => array('/gallery/album/create')),
        array('label' => Yii::t('app', 'Manage all abums'), 'url' => array('/gallery/album/manage')),
        array('label' => Yii::t('app', 'All images'), 'url' => array('/gallery/image')),
    );
}
?>

<h1 class="inline"><?php echo $model->page->title; ?></h1> (<?php echo count($images) . ' ' . Awecms::pluralize(Yii::t('app', 'image'), Yii::t('app', 'images'), count($images)); ?>) 
<br />

<?php
if ($model->page->content)
{
?>
<p class="album-desc">
<?php
    echo $model->page->content;
?>
</p>
<?php  } else { echo "<br>";}?>


<?php
foreach ($images as $image) 
{
    ?>
    <div class="img-view-block">
        <a href="<?php echo Yii::app()->createUrl('gallery/image/view', array('id' => $image->id)); ?>" class="img-hold">
            <img height="140" src="<?php echo $image->url; ?>" alt="<?php echo $image->title; ?>" />
        </a>
        <br/>
        <!--<a href="javascript:" title="<?php echo Yii::app()->createUrl('gallery/image/view', array('id' => $image->id)); ?>" onClick="var text = this.title; window.prompt ('Copy to clipboard: Ctrl+C, Enter', text);">Get link</a>-->
        <br/>
        <?php echo $image->description; ?>
    </div>
    <?php
}
?>