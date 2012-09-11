<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Events') => array('/event'),
    Yii::t('app', $model->page->title) => array('view','id'=>$model->id),
    Yii::t('app', 'Update'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label' => Yii::t('app', 'View Event'), 'url' => array('view', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Update This Event')),
        array('label' => Yii::t('app', 'Delete This Event'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'All Events'), 'url' => array('/event')),
        array('label' => Yii::t('app', 'Create New Event'), 'url' => array('/event/create')),
        array('label' => Yii::t('app', 'Manage All Events'), 'url' => array('/event/manage')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo $model->page->title; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>