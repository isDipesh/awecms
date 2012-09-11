<?php
$this->breadcrumbs = array(
    Yii::t('app', $model->owner_name),
    Yii::t('app', 'Comments') => array('/comments'),
    Yii::t('app', 'Edit'),
);
$this->menu = array(
    array('label' => Yii::t('CommentsModule.msg', 'All Comments'), 'url' => array('/comments')),
    array('label' => Yii::t('CommentsModule.msg', 'Active Comments'), 'url' => Yii::app()->createUrl('comments/manage?status=1')),
    array('label' => Yii::t('CommentsModule.msg', 'Pending Comments'), 'url' => Yii::app()->createUrl('comments/manage?status=0')),
    array('label' => Yii::t('CommentsModule.msg', 'Trash'), 'url' => Yii::app()->createUrl('comments/manage?status=2')),
    array('label' => Yii::t('CommentsModule.msg', 'Comment Settings'), 'url' => array('/comments/settings')),
);
?>

<h1> <?php echo Yii::t('app', 'Edit Comment'); ?></h1>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'comment-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'creator_id'); ?>
        <?php echo $form->dropDownList($model, 'creator_id', array_merge(array('0' => 'None'), CHtml::listData(User::model()->findAll(), 'id', 'username'))); ?>
        <?php echo $form->error($model, 'creator_id'); ?>
    </div>

    The following two fields are for guest users, used only when the comment is attached to none of the registered users.
    <div class="row">
        <?php echo $form->labelEx($model, 'user_name'); ?>
        <?php echo $form->textField($model, 'user_name', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'user_name'); ?>
        <?php echo $form->labelEx($model, 'user_email'); ?>
        <?php echo $form->textField($model, 'user_email', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'user_email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'comment_text'); ?>
        <?php echo $form->textArea($model, 'comment_text', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comment_text'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array('0' => 'Pending', '1' => 'Active', '2' => 'Trashed')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'link'); ?>
        <?php echo $form->textField($model, 'link', array('size' => 60)); ?>
        <?php echo $form->error($model, 'link'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'count'); ?>
        <?php echo $form->textField($model, 'count'); ?>
        <?php echo $form->error($model, 'count'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php
        //show all comments but current one
        $allModels = Comment::model()->findAll();
        foreach ($allModels as $key => $aModel) {
            if ($aModel->id == $model->id)
                unset($allModels[$key]);
        }
        echo $form->dropDownList($model, 'parent_id', CHtml::listData($allModels, 'id', 'id'), array('prompt' => 'None'));
        ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
        echo CHtml::Button(Yii::t('app', 'Cancel'), array(
            'submit' => 'javascript:history.go(-1)'));
        ?>
    </div>
    <?php
    $this->endWidget();
    ?>
</div>