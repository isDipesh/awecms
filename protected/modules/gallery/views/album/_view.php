<div class="album-view" itemscope itemtype="http://schema.org/ImageGallery">
    <h2>
        <a href="<?php echo Yii::app()->createUrl('/gallery/album/view', array('id' => $data->id)); ?>" itemprop="url">
            <span itemprop="name">
                <?php echo $data->title; ?>
            </span>
        </a>
    </h2>
    (<?php
                $images = Image::model()->findAllByAttributes(array('album_id' => $data->id));
                echo count($images) . ' ' . Awecms::pluralize(Yii::t('app', 'image'), Yii::t('app', 'images'), count($images));
                ?>)


    <?php
    if (!empty($data->page->title)) {
        ?>
        <?php
        if (!$data->thumbnail)
            $data->thumbnail = Image::model()->findByAttributes(array('album_id' => $data->id));
        if ($data->thumbnail) {
            ?>
            <a href="<?php echo Yii::app()->createUrl('/gallery/album/view', array('id' => $data->id)) ?>">
                <img height="160" src="<?php echo $data->thumbnail->url; ?>" alt="<?php echo $data->thumbnail->title; ?>" itemprop="image" />
            </a>
            <br />
            <?php
        }
        ?>
        <?php
    }
    ?>
</div>