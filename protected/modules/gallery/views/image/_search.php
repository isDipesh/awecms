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
		<?php echo $form->label($model, 'page_id'); ?>
		<?php echo $form->dropDownList($model, 'page', CHtml::listData(Page::model()->findAll(),'id', 'title')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'album_id'); ?>
		<?php echo $form->dropDownList($model, 'album', CHtml::listData(Album::model()->findAll(),'id', 'id'), array('prompt' => 'None')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'file'); ?>
		<?php echo $form->textField($model,'file',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'mime_type'); ?>
		<?php echo $form->textField($model,'mime_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'size'); ?>
		<?php echo $form->textField($model,'size',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->