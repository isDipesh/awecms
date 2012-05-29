<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menu Items') => array('index'),
    Yii::t('app', 'Create'),
);?>

<h1> Create New Menu Item </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>