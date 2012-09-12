<?php
$this->breadcrumbs = array(
    Yii::t('app', 'News') => array('/news'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List News'), 'url' => array('/news')),
        array('label' => Yii::t('app', 'Create New News'), 'url' => array('/news/news/create')),
        array('label' => Yii::t('app', 'Manage News')),
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
//            'id',
            array(
                'header' => Yii::t('app','Title'),
                'name' => 'page_id',
                'value' => 'isset($data->page->title)?$data->page->title:"N/A"',
                'filter' => CHtml::listData(Page::model()->findAll(), 'id', 'title'),
            ),
            array(
                'header' => Yii::t('app','Author'),
                'name' => 'page.user.username',
            ),
            'page.created_at',
            'page.modified_at',
            'page.views',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
} else {
    echo Yii::t('app', 'No results found!');
}