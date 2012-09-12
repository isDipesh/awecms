<?php
$this->breadcrumbs = array(
    Yii::t('app', 'News')
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List News')),
        array('label' => Yii::t('app', 'Create New News'), 'url' => array('/news/news/create')),
        array('label' => Yii::t('app', 'Manage News'), 'url' => array('/news/news/manage')),
    );
?>

<h1>News</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
