<div class="form">
    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'slug-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'slug'); ?>
        <?php echo $form->textField($model, 'slug', array('maxlength' => 100)); ?>
        <?php echo $form->error($model, 'slug'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'path'); ?>
        <?php echo $form->textField($model, 'path', array('maxlength' => 100)); ?>
        <?php echo $form->error($model, 'path'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'enabled'); ?>
        <?php echo $form->checkBox($model, 'enabled'); ?>
        <?php echo $form->error($model, 'enabled'); ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->