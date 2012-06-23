<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Comments') => array('/comments'),
    Yii::t('app', 'Settings') => array('.'),
    Yii::t('app', 'Create'),
);
?>

<h1> Create New Comment Settings </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>