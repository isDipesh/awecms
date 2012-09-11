<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'comment-setting-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'model'); ?>
        <?php echo $form->textField($model, 'model', array('size' => 50, 'maxlength' => 50)); ?>
        <p class="hint">e.g. Page, Blog, News, etc.</p>
        <?php echo $form->error($model, 'model'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'registeredOnly'); ?>
        <?php echo $form->checkBox($model, 'registeredOnly'); ?>
        <?php echo $form->error($model, 'registeredOnly'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'useCaptcha'); ?>
        <?php echo $form->checkBox($model, 'useCaptcha'); ?>
        <?php echo $form->error($model, 'useCaptcha'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'allowSubcommenting'); ?>
        <?php echo $form->checkBox($model, 'allowSubcommenting'); ?>
        <?php echo $form->error($model, 'allowSubcommenting'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'premoderate'); ?>
        <?php echo $form->checkBox($model, 'premoderate'); ?>
        <?php echo $form->error($model, 'premoderate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'isSuperuser'); ?>
        <?php echo $form->textArea($model, 'isSuperuser', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'isSuperuser'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'orderComments'); ?>
        <?php
        echo CHtml::activeDropDownList($model, 'orderComments', array(
            'ASC' => Yii::t('app', 'Asc'),
            'DESC' => Yii::t('app', 'Desc'),
        ));
        ?>
        <?php echo $form->error($model, 'orderComments'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'useGravatar'); ?>
        <?php echo $form->checkBox($model, 'useGravatar'); ?>
        <?php echo $form->error($model, 'useGravatar'); ?>
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