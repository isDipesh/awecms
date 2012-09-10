<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Blocks') => array('/block'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Create new block'), 'url' => array('/block/block/create')),
        array('label' => Yii::t('app', 'Manage blocks')),
    );
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Blocks'); ?> </h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'block-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        array(
            'class' => 'JToggleColumn',
            'name' => 'enabled',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'JToggleColumn',
            'name' => 'is_widget',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'JToggleColumn',
            'name' => 'hide_on_empty',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}'
        ),
    ),
));
?>