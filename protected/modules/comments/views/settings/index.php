<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Comments') => array('/comments'),
    Yii::t('app', 'Settings'),
);
$this->menu = array(
    array('label' => Yii::t('CommentsModule.msg', 'All Comments'), 'url' => array('/comments')),
    array('label' => Yii::t('CommentsModule.msg', 'Active Comments'), 'url' => Yii::app()->createUrl('comments/manage?status=1')),
    array('label' => Yii::t('CommentsModule.msg', 'Pending Comments'), 'url' => Yii::app()->createUrl('comments/manage?status=0')),
    array('label' => Yii::t('CommentsModule.msg', 'Trash'), 'url' => Yii::app()->createUrl('comments/manage?status=2')),
    array('label' => Yii::t('CommentsModule.msg', 'Comment Settings')),
);
?>


<h1>Comment Settings</h1>
<div>
    <?php echo CHtml::link('Create Settings for a Model', Yii::app()->createUrl('comments/settings/create')); ?>
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