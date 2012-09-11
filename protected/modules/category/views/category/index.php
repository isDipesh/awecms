<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Categories')
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'All Categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/category/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/category/manage')),
    );
?>

<h1>Categories</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
