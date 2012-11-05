<?php
$this->breadcrumbs = array(
    Yii::t('app', 'News') => array('/news'),
    Yii::t('app', $model->title),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'View News Item')),
        array('label' => Yii::t('app', 'Update This Item'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete This Item'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'List News'), 'url' => array('/news')),
        array('label' => Yii::t('app', 'Create New News'), 'url' => array('/news/news/create')),
        array('label' => Yii::t('app', 'Manage News'), 'url' => array('/news/news/manage')),
    );
}
?>
<article itemscope itemtype="http://schema.org/NewsArticle">

    <?php
    $this->widget('PageView', array(
        'model' => $model,
        'fields' => array('title', 'created_at', 'content', 'sub-pages', 'categories', 'tags')
    ));
    ?>

</article>