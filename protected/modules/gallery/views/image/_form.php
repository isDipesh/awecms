<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'image-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'page_id'); ?>
            <?php echo $form->dropDownList($model, 'page', CHtml::listData(Page::model()->findAll(),'id', 'title')); ?>
            <?php echo $form->error($model,'page_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'album_id'); ?>
            <?php echo $form->dropDownList($model, 'album', CHtml::listData(Album::model()->findAll(),'id', 'id'), array('prompt' => 'None')); ?>
            <?php echo $form->error($model,'album_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'file'); ?>
            <?php echo $form->textField($model,'file',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'file'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'mime_type'); ?>
            <?php echo $form->textField($model,'mime_type',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'mime_type'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'size'); ?>
            <?php echo $form->textField($model,'size',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'size'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
            <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
$this->endWidget(); ?>
</div> <!-- form -->