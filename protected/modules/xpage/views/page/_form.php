<div class="form">


    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'page-form',
        'enableAjaxValidation' => true,
            ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="right">
        <div class="row">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', Awecms::generatePairs($model->statuses)); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div><!-- row -->
        <div class="row">
            <?php
            echo $form->labelEx($model, 'parent');
            echo $form->dropDownList($model, 'parent', CHtml::listData(
                            Page::model()->findAll(), 'id', 'title'), array('prompt' => 'None')
            );
            ?>
            <?php echo $form->error($model, 'parent'); ?>
        </div><!-- row -->
        <div class="row">
            <?php echo $form->labelEx($model, 'order'); ?>
            <?php echo $form->textField($model, 'order', array('placeholder' => '0','size'=>'3')); ?>
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
        <?php
        if (Yii::app()->getModule('user')->isAdmin()) {
            ?>
            <div class = "row">
                <?php echo $form->labelEx($model, 'user_id');
                ?>
                <?php
                echo $form->dropDownList($model, 'user_id', CHtml::listData(
                                User::model()->findAll(), 'id', 'username'), array('prompt' => 'Select a user')
                );
                ?>
                <?php echo $form->error($model, 'user_id'); ?>
            </div><!-- row -->
        <?php } ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'permission'); ?>
            <?php echo $form->dropDownList($model, 'permission', Awecms::generatePairs($model->permissions), array('id' => 'permission_selector')); ?>
            <?php echo $form->error($model, 'permission'); ?>
        </div><!-- row -->
        <div class="row" id="password_row">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('maxlength' => 20, 'id' => 'password')); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div><!-- row -->
    </div>

    <div class="row">
        <?php //echo $form->labelEx($model, 'Enter title here', array('class' => 'label_floating', 'id' => 'label_title')); ?>
        <?php echo $form->textField($model, 'title', array(
            //'onclick' => 'hideLabel(this);',
            'id'=>'input_title',
            'size'=>'75',
            'placeholder' => 'Enter Title Here',
            //'onfocus' => "if(this.value == 'Enter title here') { this.value = ''; }", 'value' => 'Enter title here', 'onblur' => "if(this.value =='') this.value = 'Enter title here'; "
            )
                ); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content',array(
            'placeholder'=>'Insert Content Here',
            'cols'=>'80',
            'rows'=>'40',
        )); ?>
        <?php echo $form->error($model, 'content'); ?>
    </div><!-- row -->



    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->