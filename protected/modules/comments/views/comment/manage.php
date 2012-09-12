<?php
$this->breadcrumbs = array(
    Yii::t('CommentsModule.msg', 'Comments')
);
$this->menu = array(
    array('label' => Yii::t('CommentsModule.msg', 'All Comments'), 'url' => isset($model->status) ? array('/comments') : null),
    array('label' => Yii::t('CommentsModule.msg', 'Active Comments'), 'url' => (isset($model->status) && $model->status == 1) ? null : Yii::app()->createUrl('comments/manage?status=1')),
    array('label' => Yii::t('CommentsModule.msg', 'Pending Comments'), 'url' => (isset($model->status) && $model->status == 0) ? null : Yii::app()->createUrl('comments/manage?status=0')),
    array('label' => Yii::t('CommentsModule.msg', 'Trash'), 'url' => (isset($model->status) && $model->status == 2) ? null : Yii::app()->createUrl('comments/manage?status=2')),
    array('label' => Yii::t('CommentsModule.msg', 'Comment Settings'), 'url' => array('/comments/settings')),
);
?>

<h1>
    <?php
    $adj = 'All ';
    if (isset($model->status)) {
        switch ($model->status) {
            case '1':
                $adj = 'Active ';
                break;
            case '0':
                $adj = 'Pending ';
                break;
            case '2':
                $adj = 'Trashed ';
                break;
            default:
                break;
        }
    }
    echo $adj;
    ?>
    Comments</h1>
<div>
    <?php echo CHtml::link(Yii::t('CommentsModule.msg', 'Comment Settings'), Yii::app()->createUrl('comments/settings/')); ?>
</div>
<?php
if (count($model->search()->data)) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'comment-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            array(
//                'name' => 'id',
//                'header' => 'ID',
//                'htmlOptions' => array('width' => 2)
//            ),
            array(
                'name' => 'owner_name',
                'htmlOptions' => array('width' => 10),
            ),
//            array(
//                'name' => 'owner_id',
//                'htmlOptions' => array('width' => 10),
//            ),
            array(
                'name' => 'count',
                'header' => '#',
                'htmlOptions' => array('width' => 2),
            ),
            array(
                'name' => 'userName',
                'htmlOptions' => array('width' => 50),
            ),
            array(
                'name' => 'email',
                'htmlOptions' => array('width' => 50),
            ),
            array(
                'header' => Yii::t('CommentsModule.msg', 'Comment'),
                'value' => 'CHtml::link(CHtml::link(Yii::t("CommentsModule.msg", "$data->comment_text"), $data->link."#comment-".$data->count, array("target"=>"_blank")))',
                'type' => 'raw',
            ),
            array(
                'name' => 'create_time',
                'type' => 'datetime',
                'htmlOptions' => array('width' => 70),
                'filter' => false,
            ),
            /* 'update_time', */
            array(
                'name' => 'status',
                'value' => '$data->textStatus',
                'htmlOptions' => array('width' => 50),
                'filter' => Comment::model()->getStatuses(),
            ),
            array(
                'class' => 'CButtonColumn',
                'deleteButtonImageUrl' => false,
                'updateButtonImageUrl' => false,
                'buttons' => array(
                    'approve' => array(
                        'visible' => '$data->status==Comment::STATUS_NOT_APPROVED',
                        'label' => Yii::t('CommentsModule.msg', 'Approve'),
                        'url' => 'Yii::app()->urlManager->createUrl(CommentsModule::APPROVE_ACTION_ROUTE, array("id"=>$data->id))',
                        'options' => array('style' => 'margin-right: 5px;'),
                        'click' => 'function(){
                                        $.post($(this).attr("href")).success(function(data){
                                            data = $.parseJSON(data);
                                            if(data["code"] === "success")
                                            {
                                                $.fn.yiiGridView.update("comment-grid");
                                            }
                                        });
                                    return false;
                                }',
                    ),
                    'disapprove' => array(
                        'visible' => '$data->status==Comment::STATUS_APPROVED',
                        'label' => Yii::t('CommentsModule.msg', 'Disapprove'),
                        'url' => 'Yii::app()->urlManager->createUrl(CommentsModule::DISAPPROVE_ACTION_ROUTE, array("id"=>$data->id))',
                        'options' => array('style' => 'margin-right: 5px;'),
                        'click' => 'function(){
                                        $.post($(this).attr("href")).success(function(data){
                                            data = $.parseJSON(data);
                                            if(data["code"] === "success")
                                            {
                                                $.fn.yiiGridView.update("comment-grid");
                                            }
                                        });
                                    return false;
                                }',
                    ),
                    'delete' => array(
                        'visible' => '$data->status!=Comment::STATUS_DELETED',
                        'label' => Yii::t('CommentsModule.msg', 'Trash'),
                    ),
                    'restore' => array(
                        'visible' => '$data->status==Comment::STATUS_DELETED',
                        'label' => Yii::t('CommentsModule.msg', 'Restore'),
                        'url' => 'Yii::app()->urlManager->createUrl(CommentsModule::APPROVE_ACTION_ROUTE, array("id"=>$data->id))',
                        'options' => array('style' => 'margin-right: 5px;'),
                        'click' => 'function(){
                                        $.post($(this).attr("href")).success(function(data){
                                            data = $.parseJSON(data);
                                            if(data["code"] === "success")
                                            {
                                                $.fn.yiiGridView.update("comment-grid");
                                            }
                                        });
                                    return false;
                                }',
                    ),
                    'update' => array(
                        'label' => Yii::t('CommentsModule.msg', 'Edit'),
                    ),
                ),
                'template' => '{approve} {disapprove} {delete} {restore} {update} ',
            ),
        ),
    ));
} else {
    echo Yii::t('app', 'No results found!');
}