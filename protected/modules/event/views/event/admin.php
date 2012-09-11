<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Events') => array('/event'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'All Events'), 'url' => array('/event')),
        array('label' => Yii::t('app', 'Create New Event'), 'url' => array('/event/create')),
        array('label' => Yii::t('app', 'Manage All Events')),
    );


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('event-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Events'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?><div class="search-form" style="display: none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'event-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'venue',
        'start',
        'end',
        array(
            'class' => 'JToggleColumn',
            'name' => 'whole_day_event',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        'organizer',
        'type',
        'url',
        array(
            'name' => 'page_id',
            'value' => 'isset($data->page->title)?$data->page->title:"N/A"',
            'filter' => CHtml::listData(Page::model()->findAll(), 'id', 'title'),
        ),
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
?>