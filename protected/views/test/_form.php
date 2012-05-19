<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php
$form=$this->beginWidget('CActiveForm', array(
'id'=>'test-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	)); 

echo $form->errorSummary($model);
?>

	<div class="row">
<?php echo $form->labelEx($model,'name'); ?>
<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
<?php echo $form->error($model,'name'); ?>
<div class='hint'><?php if('hint.Test.name' != $hint = Yii::t('app', 'name')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'birthdate'); ?>
<?php echo $form->textField($model,'birthdate'); ?>
<?php echo $form->error($model,'birthdate'); ?>
<div class='hint'><?php if('hint.Test.birthdate' != $hint = Yii::t('app', 'birthdate')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'birthtime'); ?>
<?php echo $form->textField($model,'birthtime'); ?>
<?php echo $form->error($model,'birthtime'); ?>
<div class='hint'><?php if('hint.Test.birthtime' != $hint = Yii::t('app', 'birthtime')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'enabled'); ?>
<?php echo $form->textField($model,'enabled'); ?>
<?php echo $form->error($model,'enabled'); ?>
<div class='hint'><?php if('hint.Test.enabled' != $hint = Yii::t('app', 'enabled')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'status'); ?>
<?php echo $form->textField($model,'status',array('size'=>9,'maxlength'=>9)); ?>
<?php echo $form->error($model,'status'); ?>
<div class='hint'><?php if('hint.Test.status' != $hint = Yii::t('app', 'status')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'slogan'); ?>
<?php echo $form->textArea($model,'slogan',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'slogan'); ?>
<div class='hint'><?php if('hint.Test.slogan' != $hint = Yii::t('app', 'slogan')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'content'); ?>
<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'content'); ?>
<div class='hint'><?php if('hint.Test.content' != $hint = Yii::t('app', 'content')) echo $hint; ?></div>
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('test/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
