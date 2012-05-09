<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php
$form=$this->beginWidget('CActiveForm', array(
'id'=>'setting-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	)); 

echo $form->errorSummary($model);
?>

	<div class="row">
<?php echo $form->labelEx($model,'category'); ?>
<?php echo $form->textField($model,'category',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'category'); ?>
<div class='hint'><?php if('hint.Setting.category' != $hint = Yii::t('app', 'category')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'key'); ?>
<?php echo $form->textField($model,'key',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'key'); ?>
<div class='hint'><?php if('hint.Setting.key' != $hint = Yii::t('app', 'key')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'value'); ?>
<?php echo $form->textArea($model,'value',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'value'); ?>
<div class='hint'><?php if('hint.Setting.value' != $hint = Yii::t('app', 'value')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
<?php echo $form->error($model,'type'); ?>
<div class='hint'><?php if('hint.Setting.type' != $hint = Yii::t('app', 'type')) echo $hint; ?></div>
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('setting/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
