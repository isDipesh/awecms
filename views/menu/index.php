<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus') => array('/' . $this->module->id),
);
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Menus'); ?> </h1>
<?php echo CHtml::link(Yii::t('app', 'Create New Menu'), $this->createUrl('create'), array('class' => 'search-button')); ?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'menu-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        array(
            'class' => 'JToggleColumn',
            'name' => 'enabled',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        'theme',
        array(
            'name'=>'description',
            'htmlOptions' => array('style' => 'text-align:center;min-width:200px;')
            ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} | {delete}',
            'updateButtonLabel' => 'Menu Settings',
            'deleteButtonLabel' => 'Delete Menu',
            'updateButtonImageUrl' => false,
            'deleteButtonImageUrl' => false,
            'htmlOptions' => array('style' => 'text-align:center;min-width:160px;')
        ),
        array(
            'type' => 'html',
            'value' => 'CHtml::link(MenuModule::t("Edit Menu Items"),"' . $this->createUrl('/' . $this->module->id . '/item') . '/". ' . '$data->id)',
            'htmlOptions' => array('style' => 'min-width:100px;')
        ),
    ),
));
?>