<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'news-form',
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
            <?php echo $form->labelEx($model,'source'); ?>
            <?php echo $form->textField($model,'source',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'source'); ?>
        </div>
            <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
$this->endWidget(); ?>
</div> <!-- form -->