<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Albums') => array('/gallery'),
    Yii::t('app', 'Create'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List all albums'), 'url' => array('/gallery/album')),
        array('label' => Yii::t('app', 'Create new album')),
        array('label' => Yii::t('app', 'Manage all albums'), 'url' => array('/gallery/album/admin')),
        array('label' => Yii::t('app', 'All images'), 'url' => array('/gallery/image')),
    );
?>

<h1> Create New Album </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));
?>