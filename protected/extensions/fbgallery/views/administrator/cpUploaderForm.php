<?php $form=$this->beginWidget('CActiveForm', array('id'=>'cfgCollection', 'enableAjaxValidation'=>true));
	echo Chtml::hiddenField("scenario", $model->scenario);?>

	<div id="setUploaderOptions" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelUploader').' - '.$this->tr('cpOptions');?></div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('max');?>
			<?php echo $form->labelEx($model,'max'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'maxSlider',
				'value'=>$model->max,
				'options'=>array(
					'min'=>-1,
					'max'=>100,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_max").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'max', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('uploader', 'max');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('max_file_size');?>
			<?php echo $form->labelEx($model,'max_file_size'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'max_file_sizeSlider',
				'value'=>$model->max_file_size,
				'options'=>array(
					'min'=>0.1,
					'max'=>5000,
					'step'=>0.1,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_max_file_size").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'max_file_size', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('uploader', 'max_file_size');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('accept');?>
			<?php echo $form->labelEx($model,'accept'); ?>
			<?php echo $form->dropDownList($model, 'accept', array(
					'jpg'=>'jpg', 
					'png'=>'png', 
					'gif'=>'gif', 
					'jpg|png'=>'jpg|png', 
					'jpg|gif'=>'jpg|gif', 
					'png|gif'=>'png|gif', 
					'jpg|png|gif'=>'jpg|png|gif',
					'jpg|png|gif|jpeg'=>'jpg|png|gif|jpeg'
					)); ?>
			<?php echo FBAdmin::getDefaultValue('uploader', 'accept');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('pluploadLanguage');?>
			<?php echo $form->labelEx($model,'pluploadLanguage'); ?>
			<?php echo $form->dropDownList($model, 'pluploadLanguage', Uploader::getPluploaderLanguages()); ?>
			<?php echo FBAdmin::getDefaultValue('uploader', 'pluploadLanguage');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('unique_names');?>
			<?php echo $form->labelEx($model,'unique_names'); ?>
			<?php echo $form->dropDownList($model, 'unique_names', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('uploader', 'unique_names');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('runtimes');?>
			<?php echo $form->labelEx($model,'runtimes'); ?>
			<?php echo $form->dropDownList($model, 'runtimes', array(
					'gears'=>'gears', 
					'html4'=>'html4', 
					'html5'=>'html5', 
					'flash'=>'flash', 
					'silverlight'=>'silverlight', 
					'browserplus'=>'browserplus', 
					'html5, flash'=>'html5, flash', 
					'html5, flash, html4'=>'html5, flash, html4', 
					'gears,html5'=>'gears,html5', 
					'gears,html5,flash'=>'gears,html5,flash', 
					'gears,html5,flash,silverlight'=>'gears,html5,flash,silverlight',
					'gears,html5,flash,silverlight,browserplus'=>'gears,html5,flash,silverlight,browserplus'
					)); ?>
			<?php echo FBAdmin::getDefaultValue('uploader', 'runtimes');?>
		</div>
	</div>

	<div class="rowForButtons"><?php echo CHtml::ajaxSubmitButton($this->tr('saveUploader'), '', array('complete'=>'function(){$(".working").remove();}'), array('class'=>'fbCPButton'));?></div>

<?php $this->endWidget(); ?>