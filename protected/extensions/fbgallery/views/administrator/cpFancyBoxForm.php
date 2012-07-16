<?php $form=$this->beginWidget('CActiveForm', array('id'=>'cfgCollection', 'enableAjaxValidation'=>true));
	echo Chtml::hiddenField("scenario", $model->scenario);?>

	<div id="setFancyBoxOptions" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelFancyBox').' - '.$this->tr('cpOptions');?></div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('titlePosition');?>
			<?php echo $form->labelEx($model,'titlePosition'); ?>
			<?php echo $form->dropDownList($model, 'titlePosition', array('inside'=>$this->tr('inside'),'outside'=>$this->tr('outside'),'over'=>$this->tr('over'))); ?>
			<?php echo FBAdmin::getDefaultValue('fancybox', 'titlePosition');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('easingEnabled');?>
			<?php echo $form->labelEx($model,'easingEnabled'); ?>
			<?php echo $form->dropDownList($model, 'easingEnabled', array(0=>$this->tr('withoutEffect'), 1=>$this->tr('withEffect'))); ?>
			<?php echo FBAdmin::getDefaultValue('fancybox', 'easingEnabled');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('mouseEnabled');?>
			<?php echo $form->labelEx($model,'mouseEnabled'); ?>
			<?php echo $form->dropDownList($model, 'mouseEnabled', array(0=>$this->tr('withoutMouse'), 1=> $this->tr('withMouse'))); ?>
			<?php echo FBAdmin::getDefaultValue('fancybox', 'mouseEnabled');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('transitionIn');?>
			<?php echo $form->labelEx($model,'transitionIn'); ?>
			<?php echo $form->dropDownList($model, 'transitionIn', array('none'=>$this->tr('withoutEffect'),'elastic'=>$this->tr('elastic'),'fade'=>$this->tr('fade'))); ?>
			<?php echo FBAdmin::getDefaultValue('fancybox', 'transitionIn');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('transitionOut');?>
			<?php echo $form->labelEx($model,'transitionOut'); ?>
			<?php echo $form->dropDownList($model, 'transitionOut', array('none'=>$this->tr('withoutEffect'),'elastic'=>$this->tr('elastic'),'fade'=>$this->tr('fade'))); ?>
			<?php echo FBAdmin::getDefaultValue('fancybox', 'transitionOut');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('overlayShow');?>
			<?php echo $form->labelEx($model,'overlayShow'); ?>
			<?php echo $form->dropDownList($model, 'overlayShow', array(0=>$this->tr('withoutEffect'),1=>$this->tr('withEffect'))); ?>
			<?php echo FBAdmin::getDefaultValue('fancybox', 'overlayShow');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('speedIn');?>
			<?php echo $form->labelEx($model,'speedIn'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'speedInSlider',
				'value'=>$model->speedIn,
				'options'=>array(
					'min'=>10,
					'max'=>900,
					'step'=>50,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_speedIn").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'speedIn', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('fancybox', 'speedIn');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('speedOut');?>
			<?php echo $form->labelEx($model,'speedOut'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'speedOutSlider',
				'value'=>$model->speedOut,
				'options'=>array(
					'min'=>10,
					'max'=>900,
					'step'=>50,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_speedOut").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'speedOut', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('fancybox', 'speedOut');?>
		</div>

	</div>

	<div class="rowForButtons"><?php echo CHtml::ajaxSubmitButton($this->tr('saveFancyBox'), '', array('complete'=>'function(){$(".working").remove();}'), array('class'=>'fbCPButton'));?></div>

<?php $this->endWidget(); ?>