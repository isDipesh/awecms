<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'page-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->dropDownList($model, 'author', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'author'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model, 'title'); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model, 'content'); ?>
		<?php echo $form->error($model,'content'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'excerpt'); ?>
		<?php echo $form->textArea($model, 'excerpt'); ?>
		<?php echo $form->error($model,'excerpt'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'modified_at'); ?>
		<?php echo $form->textField($model, 'modified_at'); ?>
		<?php echo $form->error($model,'modified_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'parent'); ?>
		<?php echo $form->dropDownList($model, 'parent', GxHtml::listDataEx(Page::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'parent'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model, 'order'); ?>
		<?php echo $form->error($model,'order'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'comment_status'); ?>
		<?php echo $form->textField($model, 'comment_status', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'comment_status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'permission'); ?>
		<?php echo $form->textField($model, 'permission', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'permission'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('pages')); ?></label>
		<?php echo $form->checkBoxList($model, 'pages', GxHtml::encodeEx(GxHtml::listDataEx(Page::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->