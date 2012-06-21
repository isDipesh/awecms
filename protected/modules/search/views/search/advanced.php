<?php
$this->pageTitle = Yii::app()->name . ' - Search results';
$this->breadcrumbs = array(
    Yii::t('app', 'Advanced Search'),
);
?>

<h3>Advanced Search</h3>
<?php
$this->widget('SearchBlock');
