<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'zero-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div><!-- row -->
        <div class="row nm_row">
<label for="pages"><?php echo Yii::t('app', 'Pages'); ?></label>
<?php echo $form->checkBoxList($model, 'pages',
            CHtml::listData(Page::model()->findAll(),'id', 'title'),
            array('attributeitem' => 'id', 'checkAll' => 'Check All')); ?></div>

    <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
$this->endWidget(); ?>
</div> <!-- form -->