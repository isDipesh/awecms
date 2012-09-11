<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Pages')
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'All Pages')),
        array('label' => Yii::t('app', 'Create New Page'), 'url' => array('/page/create')),
        array('label' => Yii::t('app', 'Manage Pages'), 'url' => array('/page/manage')),
        array('label' => Yii::t('app', 'All Contents'), 'url' => array('/page/content')),
    );
?>

<h1>Pages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
