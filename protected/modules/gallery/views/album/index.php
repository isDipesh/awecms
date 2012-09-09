<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Albums')
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Create new album'), 'url'=>array('/gallery/album/create')),
	array('label'=>Yii::t('app', 'Manage all albums'), 'url'=>array('/gallery/album/admin')),
);
?>

<h1>Albums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
