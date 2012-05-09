<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'dashboard-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model, 'category', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'category'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->textField($model, 'path', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'path'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->checkBox($model, 'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->