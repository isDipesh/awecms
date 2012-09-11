<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Menus'),
);
$this->menu = array(
    array('label' => MenuModule::t('Manage Menus')),
    array('label' => MenuModule::t('Create New Menu'), 'url' => array('/menu/menu/create')),
);
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Menus'); ?> </h1>
<?php echo CHtml::link(Yii::t('app', 'Create New Menu'), $this->createUrl('create')); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'code_dialog',
    'options' => array(
        'title' => 'Copy the following code to appropriate place in your view or layout file:',
        'autoOpen' => false,
        'width' => 800
    ),
));
echo "
    &lt;?php \$this-&gt;widget('MenuRenderer', array('id'=&gt;<span id=\"menu_id\">1</span>)); ?&gt;";
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>


<?php
if (count($model->search()->data)) {
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
                'name' => 'description',
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
                'value' => 'CHtml::link(MenuModule::t("Edit Menu Items"),"' . $this->createUrl('/' . $this->module->id . '/item') . '?id=". ' . '$data->id)',
                'htmlOptions' => array('style' => 'min-width:100px;')
            ),
            array(
                'type' => 'raw',
                'value' => 'CHtml::link(CHtml::link("Get Code", "#", array("onclick" => "$(\"#code_dialog\").dialog(\"open\"); $(\"#menu_id\").html($data->id); return false;")))',
                'htmlOptions' => array('style' => 'min-width:100px;')
            ),
        ),
    ));
} else {
    echo Yii::t('app', 'No results found!');
}