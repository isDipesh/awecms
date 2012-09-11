<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Events') => array('/event'),
    Yii::t('app', 'Create'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label' => Yii::t('app', 'All Events'), 'url' => array('/event')),
        array('label' => Yii::t('app', 'Create New Event')),
        array('label' => Yii::t('app', 'Manage All Events'), 'url' => array('/event/admin')),
);
?>

<h1> Create New Event </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>