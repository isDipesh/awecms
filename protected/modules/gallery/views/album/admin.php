<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Albums') => array('/gallery'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List all albums'), 'url' => array('/gallery/album')),
        array('label' => Yii::t('app', 'Create new album'), 'url' => array('/gallery/album/create')),
        array('label' => Yii::t('app', 'Manage albums')),
        array('label' => Yii::t('app', 'All images'), 'url' => array('/gallery/image')),
    );
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Albums'); ?> </h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'album-grid',
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
            'name' => 'thumbnail_id',
            'value' => 'isset($data->thumbnail->id)?$data->thumbnail->id:"N/A"',
            'filter' => CHtml::listData(Image::model()->findAll(), 'id', 'id'),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>