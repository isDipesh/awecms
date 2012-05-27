<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'role-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'description'); ?>
            <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'description'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'active'); ?>
            <?php echo $form->checkBox($model,'active'); ?>
            <?php echo $form->error($model,'active'); ?>
        </div><!-- row -->
        <div class="row nm_row">
<label for="users"><?php echo Yii::t('app', 'Users'); ?></label>
<?php echo \CHtml::checkBoxList('Role[users]', array_map('Awecms::getPrimaryKey',$model->users),
            CHtml::listData(User::model()->findAll(),'id', 'username'),
            array('attributeitem' => 'id', 'checkAll' => 'Select All')); ?></div>

    <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
$this->endWidget(); ?>
</div> <!-- form -->