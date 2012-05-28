<?php
$this->breadcrumbs=array(
	'Menu'=>array('/menu'),
	'New',
);?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-new-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton(MenuModule::t("Create",array(),"actions")); ?>
		<a href="<?php echo $this->createUrl('/menu');?>"><?php echo MenuModule::t("Cancel",array(),"actions")?></a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->