<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Pages') => array('/page'),
    Yii::t('app', $page->title) => array('view', 'id' => $page->id),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'View Page'), 'url' => array('view', 'id' => $page->id)),
        array('label' => Yii::t('app', 'Update this page')),
        array('label' => Yii::t('app', 'Delete this page'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $page->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'All Pages'), 'url' => array('/page')),
        array('label' => Yii::t('app', 'Create New Page'), 'url' => array('/page/page/create')),
        array('label' => Yii::t('app', 'Manage Pages'), 'url' => array('/page/page/manage')),
        array('label' => Yii::t('app', 'All Contents'), 'url' => array('/page/page/content')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $page->title; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'page' => $page));
?>