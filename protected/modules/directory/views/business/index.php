<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Directory')
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List All')),
        array('label' => Yii::t('app', 'Add New'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('manage')),
    );
?>

<h1><?php echo Yii::t('app', 'Business Directory'); ?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
