<?php
/**
 * @var Comment model
 */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->urlManager->createUrl($this->postCommentAction),
        //'htmlOptions' => array('onsubmit' => '$.fn.commentsList.postComment($(this))'),
        'id' => $this->id,
            ));
    ?>
    <?php
    echo $form->errorSummary($newComment);
    ?>
    <?php
    echo $form->hiddenField($newComment, 'owner_name');
    echo $form->hiddenField($newComment, 'owner_id');
    echo $form->hiddenField($newComment, 'parent_id', array('class' => 'parent_id'));
    $newComment->link = $_SERVER['REQUEST_URI'];
    echo $form->hiddenField($newComment, 'link');
    ?>
        <?php if (Yii::app()->user->isGuest == true): ?>
        <div class="row">
            <?php echo $form->labelEx($newComment, 'user_name'); ?>
            <?php echo $form->textField($newComment, 'user_name', array('size' => 40)); ?>
    <?php echo $form->error($newComment, 'user_name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($newComment, 'user_email'); ?>
            <?php echo $form->textField($newComment, 'user_email', array('size' => 40)); ?>
            <br/>The e-mail address shall not be revealed in the website. It is required so that we can notify you of replies.
    <?php echo $form->error($newComment, 'user_email'); ?>
        </div>
<?php endif; ?>

    <div class="row">
        <?php //echo $form->labelEx($newComment, 'comment_text'); ?>
        <?php echo $form->textArea($newComment, 'comment_text', array('cols' => 60, 'rows' => 10)); ?>
<?php echo $form->error($newComment, 'comment_text'); ?>
    </div>

        <?php if ($this->useCaptcha && extension_loaded('gd')): ?>
        <div class="row">
                <?php echo $form->labelEx($newComment, 'verifyCode'); ?>
            <div>
                <?php
                $this->widget('CCaptcha', array(
                    'captchaAction' => CommentsModule::CAPTCHA_ACTION_ROUTE,
                ));
                ?>
    <?php echo $form->textField($newComment, 'verifyCode'); ?>

            </div>
            <div class="hint">
                <?php echo Yii::t('CommentsModule.msg', '
                    Please enter the letters as they are shown in the image above.
                    <br/>Letters are not case-sensitive.
                '); ?>
            </div>
        <?php echo $form->error($newComment, 'verifyCode'); ?>
        </div>
        <?php
    endif;
    ?>
<?php $this->endWidget(); ?>
</div><!-- form -->