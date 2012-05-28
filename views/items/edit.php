<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-items-new-form',
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
		<?php echo $form->labelEx($model,'controller'); ?>
		<?php echo $form->textField($model,'controller'); ?>
		<?php echo $form->error($model,'controller'); ?>
	</div>
	<?php $this->widget('mext.AtUIAutocomplete',array(
		'id'=>'MMenuItems_controller',
		'source'=>'http://'.Yii::app()->request->getServerName().$this->createUrl('/menu/autocomplete/controllers')
	));?>
	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action'); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>
	<?php $this->widget('mext.AtUIAutocomplete',array(
		'id'=>'MMenuItems_action',
		'source'=>'http://'.Yii::app()->request->getServerName().$this->createUrl('/menu/autocomplete/conts')
	));?>
	<div class="row">
		<table style="width:auto;">
			<tr>
				<td>
					<?php echo $form->labelEx($model,'var_name'); ?>
					<?php echo $form->textField($model,'var_name'); ?>
					<?php echo $form->error($model,'var_name'); ?>
				</td>
				<td>
					<?php echo $form->labelEx($model,'var_id'); ?>
					<?php echo $form->textField($model,'var_id'); ?>
					<?php echo $form->error($model,'var_id'); ?>
				</td>
			</tr>
		</table>
	</div>
	<?php $this->widget('mext.AtUIAutocomplete',array(
		'id'=>'MMenuItems_var_name',
		'source'=>'http://'.Yii::app()->request->getServerName().$this->createUrl('/menu/autocomplete/varnames')
	));?>
	<?php $this->widget('mext.AtUIAutocomplete',array(
		'id'=>'MMenuItems_var_id',
		'source'=>'http://'.Yii::app()->request->getServerName().$this->createUrl('/menu/autocomplete/varids')
	));?>
	<div class="row">
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php echo $form->textField($model,'menu_id'); ?>
		<?php echo $form->error($model,'menu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'left'); ?>
		<?php echo $form->textField($model,'left'); ?>
		<?php echo $form->error($model,'left'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'right'); ?>
		<?php echo $form->textField($model,'right'); ?>
		<?php echo $form->error($model,'right'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->checkBox($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expanded'); ?>
		<?php echo $form->checkBox($model,'expanded'); ?>
		<?php echo $form->error($model,'expanded'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('db'=>'db', 'view'=>'view')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	<?php 
		$rows=Content::model()->findAll();
		$opts=array();
		foreach($rows AS $row):
			$opts[$row->id]=$row->title;
		endforeach;
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'content_id'); ?>
		<?php echo $form->dropDownList($model,'content_id',$opts); ?>
		<?php echo $form->error($model,'content_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->