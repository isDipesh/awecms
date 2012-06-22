<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Accesses') => array('index'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'List'), 'url' => array('index')),
    );
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Accesses'); ?> </h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'access-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'module',
        'controller',
        'action',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>