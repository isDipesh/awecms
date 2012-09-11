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
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'News'); ?> </h1>

<?php
if (count($model->search()->data)) {
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
} else {
    echo Yii::t('app', 'No results found!');
}