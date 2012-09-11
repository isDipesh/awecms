<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Gallery') => array('/gallery'),
    Yii::t('app', 'All Images') => array('/gallery/image'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List all albums'), 'url' => array('/gallery/album')),
        array('label' => Yii::t('app', 'Create new album'), 'url' => array('/gallery/album/create')),
        array('label' => Yii::t('app', 'Manage all albums'), 'url' => array('/gallery/album/manage')),
        array('label' => Yii::t('app', 'All images'), 'url' => array('/gallery/image')),
        array('label' => Yii::t('app', 'Manage all images')),
    );
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Images'); ?> </h1>

<?php
if (count($model->search()->data)) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'image-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'title',
            'description',
            array(
                'name' => 'album_id',
                'value' => 'isset($data->album->id)?$data->album->id:"N/A"',
                'filter' => CHtml::listData(Album::model()->findAll(), 'id', 'id'),
            ),
            'file',
            'mime_type',
            'size',
            'name',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
} else {
    echo Yii::app('app', 'No results found!');
}