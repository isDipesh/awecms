<div class="form">
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'menu-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'enabled'); ?>
        <?php echo $form->checkBox($model, 'enabled'); ?>
        <?php echo $form->error($model, 'enabled'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'vertical'); ?>
        <?php echo $form->checkBox($model, 'vertical'); ?>
        <?php echo $form->error($model, 'vertical'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'rtl'); ?>
        <?php echo $form->checkBox($model, 'rtl'); ?>
        <?php echo $form->error($model, 'rtl'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'upward'); ?>
        <?php echo $form->checkBox($model, 'upward'); ?>
        <?php echo $form->error($model, 'upward'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'theme'); ?>
        <?php echo $form->dropDownList($model, 'theme', $model->themes); ?>
        <?php echo $form->error($model, 'theme'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div><!-- row -->

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