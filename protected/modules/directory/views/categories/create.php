<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Categories') => array('index'),
    Yii::t('app', 'Create'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'List'), 'url'=>array('index')),
        array('label'=>Yii::t('app', 'Create')),
	array('label'=>Yii::t('app', 'Manage'), 'url'=>array('manage')),
);
?>

<h1> Create New BusinessCategory </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>