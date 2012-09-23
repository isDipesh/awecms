<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Businesses')
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
        array('label'=>Yii::t('app', 'List')),
	array('label'=>Yii::t('app', 'Create'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage'), 'url'=>array('manage')),
);
?>

<h1><?php echo Yii::t('app', 'Businesses'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
