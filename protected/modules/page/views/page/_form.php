<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'page-form',
        'enableAjaxValidation' => true,
            ));
    ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'user_id'); ?>
        <?php
        //TODO show this if superuser
        echo $form->dropDownList($model, 'user_id', CHtml::listData(
                        User::model()->findAll(), 'id', 'username'), array('prompt' => 'Select a user')
        );
        ?>
        <?php echo $form->error($model, 'user_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textArea($model, 'title'); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content'); ?>
        <?php echo $form->error($model, 'content'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', Awecms::generatePairs($model->statuses)); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div><!-- row -->
    <div class="row">
        <?php
        echo $form->labelEx($model, 'parent');
        echo $form->dropDownList($model, 'parent', CHtml::listData(
                        Page::model()->findAll(), 'id', 'title'), array('prompt' => 'Select a page')
        );
        ?>
        <?php echo $form->error($model, 'parent'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'order'); ?>
        <?php echo $form->textField($model, 'order'); ?>
        <?php echo $form->error($model, 'order'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->dropDownList($model, 'type', Awecms::generatePairs($model->types)); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'comment_status'); ?>
        <?php echo $form->dropDownList($model, 'comment_status', Awecms::generatePairs($model->comment_statuses)); ?>
        <?php echo $form->error($model, 'comment_status'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'tags_enabled'); ?>
        <?php echo $form->checkBox($model, 'tags_enabled'); ?>
        <?php echo $form->error($model, 'tags_enabled'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'permission'); ?>
        <?php echo $form->dropDownList($model, 'permission', Awecms::generatePairs($model->permissions)); ?>
        <?php echo $form->error($model, 'permission'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('maxlength' => 20)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div><!-- row -->

    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->