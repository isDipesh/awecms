<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Events')
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'All Events')),
        array('label' => Yii::t('app', 'Create New Event'), 'url' => array('/event/create')),
        array('label' => Yii::t('app', 'Manage All Events'), 'url' => array('/event/manage')),
    );
?>

<h1>Events</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
