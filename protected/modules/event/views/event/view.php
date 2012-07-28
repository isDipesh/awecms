<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Events') => array('index'),
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

<h1><?php echo $model->page->title; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'id',
            'visible' => Yii::app()->getModule('user')->isAdmin()
        ), 'venue', 'start', 'end', 'organizer', 'type', array(
            'name' => 'url',
            'type' => 'url'
        ), array(
            'name' => 'page_id',
            'value' => ($model->page !== null) ? CHtml::link($model->page->title, array('/page/page/view', 'id' => $model->page->id)) . ' ' : 'n/a',
            'type' => 'html',
        ),
        )));
?>