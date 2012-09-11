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
        array('label' => Yii::t('app', 'Create New Event'), 'url' => array('/event/create')),
        array('label' => Yii::t('app', 'Manage All Events'), 'url' => array('/event/admin')),
    );
}
?>
<?php
if (isset($model->start)) {
    ?>
    <div class="date">
        <div><?php echo date('d', strtotime($model->start)); ?><span><?php echo date('M', strtotime($model->start)); ?></span></div>
    </div>
<?php }
?>
<div class="event-details">
    <h1><?php echo $model->page->title; ?></h1>

    <p class="clear">
        <?php
        if (isset($model->start)) {
            echo '<b>' . CHtml::encode($model->getAttributeLabel('start')) . '</b>';
            ?>:
            <?php
            echo date('D, d M Y H:i:s', strtotime($model->start));
        }
        ?>
        <br/>
        <?php
        if (isset($model->end)) {
            echo '<b>' . CHtml::encode($model->getAttributeLabel('end')) . '</b>';
            ?>:
            <?php
            echo date('D, d M Y H:i:s', strtotime($model->end));
        }
        ?>
    </p>
</div>
<div class="event-list-venue right">
    <p>
        <?php
        if (isset($model->venue)) {
            echo '<b>' . CHtml::encode($model->getAttributeLabel('venue')) . '</b>:';
            ?>
            <?php
            echo nl2br($model->venue);
        }
        ?>
    </p>
</div>
<b class="clear left">Event Description:</b>
<div class="event-desc ">
    <?php
    if (isset($model->page->content)) {
        ?>
        <div class="desc-holder">
            <?php
            echo nl2br($model->page->content);
        }
        ?>
    </div>
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
    echo nl2br($model->type);
}
?>