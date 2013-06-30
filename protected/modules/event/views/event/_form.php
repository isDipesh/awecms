<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'event-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);


    $this->widget('PageForm', array(
        'model' => $model,
        'form' => $form,
        'fields' => array('title')
    ));
    ?>

    <div class="row">
        <?php // echo $form->labelEx($model, 'whole_day_event'); ?>
        <?php // echo $form->checkBox($model, 'whole_day_event'); ?>
        <?php // echo $form->error($model, 'whole_day_event'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'start', array('style' => 'display:inline;')); ?>
        <?php
        $this->widget('CJuiDateTimePicker', array(
            'model' => $model,
            'name' => 'Event[start]',
            'language' => '',
            'value' => $model->start,
            'mode' => 'datetime',
            'options' => array(
                'showAnim' => 'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                'showButtonPanel' => true,
                'changeYear' => true,
                'changeMonth' => true,
                'dateFormat' => 'yy-mm-dd',
            ),
                )
        );
        ?>

        <?php echo $form->error($model, 'start'); ?>

        <?php echo $form->labelEx($model, 'end', array('style' => 'display:inline;')); ?>
        <?php
        $this->widget('CJuiDateTimePicker', array(
            'model' => $model,
            'name' => 'Event[end]',
            'language' => '',
            'value' => $model->end,
            'mode' => 'datetime',
            'options' => array(
                'showAnim' => 'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                'showButtonPanel' => true,
                'changeYear' => true,
                'changeMonth' => true,
                'dateFormat' => 'yy-mm-dd',
            ),
                )
        );
        ;
        ?>
        <?php echo $form->error($model, 'end'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'venue'); ?>
        <?php echo $form->textArea($model, 'venue', array('class' => 'textarea')); ?>
        <?php echo $form->error($model, 'venue'); ?>
    </div>

    <div class="row">
        <b><?php echo Yii::t('app', 'Description'); ?></b>
        <?php
        $page = isset($model->page) ? $model->page : new Page;
        $this->widget('ext.redactor.ERedactorWidget', array(
            "model" => $page,
            "attribute" => "content",
            'options' => array(
                'imageUpload' => Yii::app()->createAbsoluteUrl('/file/redactorUpload'),
            ),
        ));
        ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'organizer'); ?>
        <?php echo $form->textArea($model, 'organizer', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'organizer'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->textField($model, 'type', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
        <?php echo $form->textField($model, 'url', array('size' => 60)); ?>
        <?php echo $form->error($model, 'url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'enabled'); ?>
        <?php echo $form->checkBox($model, 'enabled'); ?>
        <?php echo $form->error($model, 'enabled'); ?>
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