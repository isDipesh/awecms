<?php
$this->breadcrumbs = array(
    $model->label(2) => array('/admin/slug'),
    Yii::t('app', 'Manage'),
);
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>


<?php
if (count($model->search()->data)) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'slug-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'slug',
            'path',
            array(
                'class' => 'JToggleColumn',
                'name' => 'enabled', // boolean model attribute (tinyint(1) with values 0 or 1)
                'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                'model' => get_class($model),
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{update} {delete}',
            ),
        ),
    ));
} else {
    echo Yii::t('app', 'No results found!');
}