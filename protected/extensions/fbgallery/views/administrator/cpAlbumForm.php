<?php $form=$this->beginWidget('CActiveForm', array('id'=>'cfgCollection', 'enableAjaxValidation'=>true));
	echo Chtml::hiddenField("scenario", $model->scenario);?>

	<div id="setAlbumAspect" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelAlbum').' - '.$this->tr('cpAppearance');?></div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('itemsOnPaginate');?>
			<?php echo $form->labelEx($model,'itemsOnPaginate'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'itemsOnPaginateSlider',
				'value'=>$model->itemsOnPaginate,
				'options'=>array(
					'min'=>0,
					'max'=>500,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_itemsOnPaginate").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'itemsOnPaginate', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('album', 'itemsOnPaginate');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('itemsOnLine');?>
			<?php echo $form->labelEx($model,'itemsOnLine'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'itemsOnLineSlider',
				'value'=>$model->itemsOnLine,
				'options'=>array(
					'min'=>1,
					'max'=>20,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_itemsOnLine").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'itemsOnLine', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('album', 'itemsOnLine');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('hideTooltips');?>
			<?php echo $form->labelEx($model,'hideTooltips'); ?>
			<?php echo $form->dropDownList($model, 'hideTooltips', array(false=>$this->tr('showTooltips'),true=>$this->tr('hideTooltips'))); ?>
			<?php echo FBAdmin::getDefaultValue('album', 'hideTooltips');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('showAlbumTitle');?>
			<?php echo $form->labelEx($model,'showAlbumTitle'); ?>
			<?php echo $form->dropDownList($model, 'showAlbumTitle', array(false=>$this->tr('withoutInformation'), true=>$this->tr('withInformation'))); ?>
			<?php echo FBAdmin::getDefaultValue('album', 'showAlbumTitle');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('showAlbumTitleDescription');?>
			<?php echo $form->labelEx($model,'showAlbumTitleDescription'); ?>
			<?php echo $form->dropDownList($model, 'showAlbumTitleDescription', array(false=>$this->tr('withoutInformation'),  true=>$this->tr('withInformation'))); ?>
			<?php echo FBAdmin::getDefaultValue('album', 'showAlbumTitleDescription');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('showAlbumTags');?>
			<?php echo $form->labelEx($model,'showAlbumTags'); ?>
			<?php echo $form->dropDownList($model, 'showAlbumTags', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('album', 'showAlbumTags');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('thTitleShow');?>
			<?php echo $form->labelEx($model,'thTitleShow'); ?>
			<?php echo $form->dropDownList($model, 'thTitleShow', array(false=>$this->tr('hideTitle'),true=>$this->tr('showTitle'))); ?>
			<?php echo FBAdmin::getDefaultValue('album', 'thTitleShow');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('useInfoBox');?>
			<?php echo $form->labelEx($model,'useInfoBox'); ?>
			<?php echo $form->dropDownList($model, 'useInfoBox', array(false=>$this->tr('hideInfo'),true=>$this->tr('showInfo'))); ?>
			<?php echo FBAdmin::getDefaultValue('album', 'useInfoBox');?>
		</div>

	</div>

	<div class="rowForButtons"><?php echo CHtml::ajaxSubmitButton($this->tr('saveAlbum'), '', array('complete'=>'function(){$(".working").remove();}'), array('class'=>'fbCPButton'));?></div>

<?php $this->endWidget(); ?>