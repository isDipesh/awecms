<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Tests')
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Create'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage'), 'url'=>array('admin')),
);
?>

<h1>Tests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
