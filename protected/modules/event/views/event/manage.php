<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Events') => array('/event'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'All Events'), 'url' => array('/event')),
        array('label' => Yii::t('app', 'Create New Event'), 'url' => array('/event/event/create')),
        array('label' => Yii::t('app', 'Manage All Events')),
    );
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Events'); ?> </h1>

<?php
if (count($model->search()->data)) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'event-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'header' => 'Title',
                'name' => 'page_id',
                'value' => 'isset($data->page->title)?$data->page->title:"N/A"',
                'filter' => CHtml::listData(Page::model()->findAll(), 'id', 'title'),
            ),
            'venue',
            'start',
            'end',
//            array(
//                'class' => 'JToggleColumn',
//                'name' => 'whole_day_event',
//                'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
//                'model' => get_class($model),
//                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
//            ),
            'organizer',
//            'type',
            array(
                'class' => 'JToggleColumn',
                'name' => 'enabled',
                'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                'model' => get_class($model),
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
            ),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
} else {
    echo Yii::t('app', 'No results found!');
}