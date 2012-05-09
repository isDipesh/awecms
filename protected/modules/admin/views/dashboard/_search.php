<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'category'); ?>
		<?php echo $form->textField($model, 'category', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'path'); ?>
		<?php echo $form->textField($model, 'path', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'enabled'); ?>
		<?php echo $form->dropDownList($model, 'enabled', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
