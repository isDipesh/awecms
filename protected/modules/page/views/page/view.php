<?php

$this->breadcrumbs = $page->getHierarchyLinks();
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'View Page')),
        array('label' => Yii::t('app', 'Update this page'), 'url' => array('update', 'id' => $page->id)),
        array('label' => Yii::t('app', 'Delete this page'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $page->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'All Pages'), 'url' => array('/page')),
        array('label' => Yii::t('app', 'Create New Page'), 'url' => array('/page/page/create')),
        array('label' => Yii::t('app', 'Manage Pages'), 'url' => array('/page/page/manage')),
        array('label' => Yii::t('app', 'All Contents'), 'url' => array('/page/page/content')),
    );
}

$this->widget('PageView', array(
    'model' => $page,
    'fields' => array('title', 'content', 'sub-pages', 'categories', 'tags')
));

$this->widget('Share');