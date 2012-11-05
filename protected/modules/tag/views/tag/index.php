<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Tags')
);
?>

<h1><?php echo Yii::t('app', 'All Tags'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
