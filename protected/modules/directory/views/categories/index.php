<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Categories')
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List All'), 'url' => array('/directory/business')),
        array('label' => Yii::t('app', 'Add New'), 'url' => array('/directory/business/create')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('/directory/business/manage')),
        array('label' => Yii::t('app', 'All Categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/directory/categories/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
    );
?>

<h1><?php echo Yii::t('app', 'Business Categories'); ?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
