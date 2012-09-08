<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'enabled'); ?>
		<?php echo $form->checkBox($model,'enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'is_widget'); ?>
		<?php echo $form->checkBox($model,'is_widget'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'widget_class'); ?>
		<?php echo $form->textField($model,'widget_class',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tag_name'); ?>
		<?php echo $form->textField($model,'tag_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'html_options'); ?>
		<?php echo $form->textArea($model,'html_options',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'decoration_css_class'); ?>
		<?php echo $form->textField($model,'decoration_css_class',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_css_class'); ?>
		<?php echo $form->textField($model,'title_css_class',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'content_css_class'); ?>
		<?php echo $form->textField($model,'content_css_class',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'hide_on_empty'); ?>
		<?php echo $form->checkBox($model,'hide_on_empty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'skin'); ?>
		<?php echo $form->textField($model,'skin',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->