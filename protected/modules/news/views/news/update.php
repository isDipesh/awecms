<?php
$this->breadcrumbs = array(
    Yii::t('app', 'News') => array('/news'),
    Yii::t('app', $model->page->title) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'View News Item'), 'url' => array('view', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Update This Item')),
        array('label' => Yii::t('app', 'Delete This Item'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'List News'), 'url' => array('/news')),
        array('label' => Yii::t('app', 'Create New News'), 'url' => array('/news/news/create')),
        array('label' => Yii::t('app', 'Manage News'), 'url' => array('/news/news/manage')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $model->page->title; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
));
?>