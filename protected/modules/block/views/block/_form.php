<div class="form">
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'block-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php
        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $model,
            "attribute" => "content",
            "defaultValue" => $model->content,
            "config" => array(
                "height" => "200px",
                'toolbar' => 'Basic',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'enabled'); ?>
        <?php echo $form->checkBox($model, 'enabled'); ?>
        <?php echo $form->error($model, 'enabled'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'is_widget'); ?>
        <?php echo $form->checkBox($model, 'is_widget'); ?>
        <?php echo $form->error($model, 'is_widget'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'widget_class'); ?>
        <?php echo $form->textField($model, 'widget_class', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'widget_class'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tag_name'); ?>
        <?php echo $form->textField($model, 'tag_name', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'tag_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'html_options'); ?>
        <?php echo $form->textArea($model, 'html_options', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'html_options'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'decoration_css_class'); ?>
        <?php echo $form->textField($model, 'decoration_css_class', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'decoration_css_class'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title_css_class'); ?>
        <?php echo $form->textField($model, 'title_css_class', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'title_css_class'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content_css_class'); ?>
        <?php echo $form->textField($model, 'content_css_class', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'content_css_class'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'hide_on_empty'); ?>
        <?php echo $form->checkBox($model, 'hide_on_empty'); ?>
        <?php echo $form->error($model, 'hide_on_empty'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'skin'); ?>
        <?php echo $form->textField($model, 'skin', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'skin'); ?>
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