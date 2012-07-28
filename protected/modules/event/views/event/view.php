<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Events') => array('/event'),
    Yii::t('app', $model->page->title),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
    );
}
?>
<?php
if (isset($model->start)) {
    ?>
    <div class="date">
        <p>
            <?php echo date('d', strtotime($model->start)); ?>
            <span>
                <?php echo date('M', strtotime($model->start)); ?>
            </span>
        </p>
    </div>
<?php }
?>

<h1><?php echo $model->page->title; ?></h1>
<?php
if (isset($model->start)) {
    echo CHtml::encode($model->getAttributeLabel('start'));
    ?>:
    <?php
    echo date('D, d M Y H:i:s', strtotime($model->start));
}
?>

<br/>
<?php
if (isset($model->end)) {
    echo CHtml::encode($model->getAttributeLabel('end'));
    ?>:
    <?php
    echo date('D, d M Y H:i:s', strtotime($model->end));
}
?>
<br/>
<br/>
<?php
if (isset($model->venue)) {
    echo CHtml::encode($model->getAttributeLabel('venue'));
    ?>:
    <?php
    echo nl2br($model->venue);
}
?>
<br/>
<br/>
<?php
if (isset($model->page->content)) {
    echo CHtml::encode(Yii::t('event', 'Description'));
    ?>:
    <?php
    echo nl2br($model->page->content);
}
?>
<br/>
<br/>
<?php
if (isset($model->organizer)) {
    echo CHtml::encode($model->getAttributeLabel('organizer'));
    ?>:
    <?php
    echo nl2br($model->organizer);
}
?>
<br/>
<br/>
<?php
if (isset($model->type)) {
    echo CHtml::encode($model->getAttributeLabel('type'));
    ?>:
    <?php
    echo nl2br($model->type);
}
?>