<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Gallery') => array('/gallery'),
    Yii::t('app', 'All Images')
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List all albums'), 'url' => array('/gallery/album')),
        array('label' => Yii::t('app', 'Create new album'), 'url' => array('/gallery/album/create')),
        array('label' => Yii::t('app', 'Manage all albums'), 'url' => array('/gallery/album/admin')),
        array('label' => Yii::t('app', 'All images')),
        array('label' => Yii::t('app', 'Manage all images'), 'url' => array('/gallery/image/admin')),
    );
?>

<h1><?php echo Yii::t('app', 'All Images'); ?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
