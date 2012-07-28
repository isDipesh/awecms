<?php
$this->breadcrumbs = array(
    Yii::t('app', 'News') => array('/news'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'List'), 'url' => array('/news')),
    );


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('news-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'News'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?><div class="search-form" style="display: none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php
$this->widget('zii.widgets.grid.CGridView', array(
'id' => 'news-grid',
 'dataProvider' => $model->search(),
 'filter' => $model,
 'columns' => array(
'id',
 array(
'name' => 'page_id',
 'value' => 'isset($data->page->title)?$data->page->title:"N/A"',
 'filter' => CHtml::listData(Page::model()->findAll(), 'id', 'title'),
 ),
 array(
'class' => 'CButtonColumn',
 ),
 ),
));
?>