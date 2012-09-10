<?php

$this->breadcrumbs = array(
    Yii::t('app', 'Albums') => array('index'),
    Yii::t('app', $model->page->title) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'View album'), 'url' => array('/gallery/album/view', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Edit this album'), 'url' => array('/gallery/album/update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete this album'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'Create new album'), 'url' => array('/gallery/album/create')),
        array('label' => Yii::t('app', 'Manage all albums'), 'url' => array('/gallery/album/admin')),
    );


$this->widget('xupload.XUpload', array(
    'url' => Yii::app()->createUrl("gallery/image/upload", array(
        'album_id' => $model->id,
//        'folder' => 'myfolder',
    )),
    'model' => new Image,
    'attribute' => 'file',
    'multiple' => true,
    'options' => array(
    ),
        )
);
?>