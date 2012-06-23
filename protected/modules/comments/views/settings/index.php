<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Comments') => array('/comments'),
    Yii::t('app', 'Settings'),
);
?>



<div class="right">
    <?php echo CHtml::link('Create Settings for a Model', Yii::app()->createUrl('/comments/settings/create')); ?>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'comment-setting-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'model',
        array(
            'class' => 'JToggleColumn',
            'name' => 'registeredOnly',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'JToggleColumn',
            'name' => 'useCaptcha',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'JToggleColumn',
            'name' => 'allowSubcommenting',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'JToggleColumn',
            'name' => 'premoderate',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        'orderComments',
        array(
            'class' => 'JToggleColumn',
            'name' => 'useGravatar',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($model),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'deleteButtonImageUrl' => false,
            'updateButtonImageUrl' => false,
            'updateButtonLabel' => 'Edit',
            'buttons' => array(
                'delete' => array(
                    'visible' => '$data->model!="default"',
                ),
            ),
        ),
    ),
));
?>