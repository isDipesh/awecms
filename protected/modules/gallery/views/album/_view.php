<div class="album-view">
    <h3><?php echo CHtml::link(CHtml::encode($data->page->title), array('view', 'id' => $data->id)); ?>
        (<?php
$images = Image::model()->findAllByAttributes(array('album_id' => $data->id));
echo count($images) . ' ' . Awecms::pluralize(Yii::t('app', 'image'), Yii::t('app', 'images'), count($images));
?>)
    </h3>

    <?php
    if (!empty($data->page->title)) {
        ?>
        <?php
        if (!$data->thumbnail)
            $data->thumbnail = Image::model()->findByAttributes(array('album_id' => $data->id));
        if ($data->thumbnail) {
            ?>
            <a href="<?php echo Yii::app()->createUrl('gallery/album/view', array('id' => $data->id)) ?>">
                <img width="160" src="<?php echo $data->thumbnail->url; ?>" alt="<?php echo $data->thumbnail->title; ?>">
            </a>
            <br />
            <?php
        }
        ?>
        <?php
    }
    ?>
</div>