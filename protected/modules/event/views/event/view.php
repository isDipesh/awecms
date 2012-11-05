<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Events') => array('/event'),
    Yii::t('app', $model->page->title),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'View Event')),
        array('label' => Yii::t('app', 'Update This Event'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete This Event'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'All Events'), 'url' => array('/event')),
        array('label' => Yii::t('app', 'Create New Event'), 'url' => array('/event/event/create')),
        array('label' => Yii::t('app', 'Manage All Events'), 'url' => array('/event/event/manage')),
    );
}
?>
<div itemscope itemtype="http://schema.org/Event">
    <?php
    if (isset($model->start)) {
        ?>
        <div class="date">
            <div><?php echo date('d', strtotime($model->start)); ?><span><?php echo date('M', strtotime($model->start)); ?></span></div>
        </div>
    <?php }
    ?>
    <div class="event-details">
        <h1 itemprop="name"><?php echo $model->page->title; ?></h1>

        <p class="clear">
            <?php
            if (isset($model->start)) {
                echo '<b>' . CHtml::encode($model->getAttributeLabel('start')) . '</b>';
                ?>:
                <?php
                echo '<meta itemprop="startDate" content="' . date('Y-m-d\TH:i:s', strtotime($model->start)) . '">';
                echo date('D, d M Y H:i:s', strtotime($model->start));
            }
            ?>
            <br/>
            <?php
            if (isset($model->end)) {
                echo '<b>' . CHtml::encode($model->getAttributeLabel('end')) . '</b>';
                ?>:
                <?php
                echo '<meta itemprop="endDate" content="' . date('Y-m-d\TH:i:s', strtotime($model->end)) . '">';
                echo date('D, d M Y H:i:s', strtotime($model->end));
            }
            ?>
        </p>
    </div>

    <p>
        <?php
        if (isset($model->venue)) {
            ?>
        <div class="event-list-venue right" itemprop="location"s>
            <?php
            echo '<b>' . CHtml::encode($model->getAttributeLabel('venue')) . '</b>:';
            ?>
            <?php
            echo nl2br($model->venue);
            ?>
        </div>
        <?php
    }
    ?>
</p>



<?php
if (isset($model->page->content)) {
    ?>
    <div class="event-desc" itemprop="description">
        <?php
        echo nl2br($model->page->content);
    }
    ?>
</div>

<div class="event-org clear">
    <?php
    if (isset($model->organizer)) {
        echo CHtml::encode($model->getAttributeLabel('organizer'));
        ?>:
        <?php
        echo nl2br($model->organizer);
    }
    ?>
</div>
<?php
if (isset($model->type)) {
    echo CHtml::encode($model->getAttributeLabel('type'));
    ?>:
    <?php
    echo $model->type;
}
?>
<div class="url">
    <?php
    if (isset($model->url)) {
        echo Yii::t('app', 'URL');
        ?>:
        <?php
        echo CHtml::link($model->url, $model->url, array('itemprop' => 'url'));
    }
    ?>
</div>
</div>