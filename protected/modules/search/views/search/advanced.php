<?php
$this->pageTitle = Yii::app()->name . ' - Search results';
$this->breadcrumbs = array();
if ($type)
    $this->breadcrumbs[] = ucfirst($type);
$this->breadcrumbs[] = Yii::t('app', 'Advanced Search');
?>

<h3>
    <?php echo Yii::t('app', 'Advanced'); ?>
    <?php if ($type) echo ' ' . ucfirst($type); ?>
<?php echo ' ' . Yii::t('app', 'Search'); ?>
</h3>
<?php
$this->widget('SearchBlock', array('type' => $type));
