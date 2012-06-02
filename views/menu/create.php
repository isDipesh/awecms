<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus') => array('index'),
    Yii::t('app', 'Create'),
);
?>

<h1> Create New Menu </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>