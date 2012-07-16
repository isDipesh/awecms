<?php $form=$this->beginWidget('CActiveForm', array('id'=>'cfgGallery', 'enableAjaxValidation'=>true));
	echo Chtml::hiddenField("scenario", $model->scenario);
?>
	<div id="setGalleryAspect" class="containerMessage displaySetting" style="display: block;">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelGallery').' - '.$this->tr('cpAppearance');?></div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('cssTheme');?>
			<?php echo $form->labelEx($model,'cssTheme'); ?>
			<?php echo $form->dropDownList($model, 'cssTheme', operations::existingThemes(), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'cssTheme');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('thumbStyle');?>
			<?php echo $form->labelEx($model,'thumbStyle'); ?>
			<?php echo $form->dropDownList($model, 'thumbStyle', array('landscape' => $this->tr('landscape'), 'portrait' => $this->tr('portrait'), 'square' => $this->tr('square')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'thumbStyle');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('thumbWidth');?>
			<?php echo $form->labelEx($model,'thumbWidth'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'thumbWidthSlider',
				'value'=>$model->thumbWidth,
				'options'=>array(
					'min'=>50,
					'max'=>500,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_thumbWidth").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'thumbWidth', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'thumbWidth');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('ratioThumb');?>
			<?php echo $form->labelEx($model,'ratioThumb'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'ratioThumbSlider',
				'value'=>$model->ratioThumb,
				'options'=>array(
					'min'=>0,
					'max'=>1,
					'step'=>0.01,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_ratioThumb").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'ratioThumb', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'ratioThumb');?>
		</div>
	</div>

	<div id="setShop" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelGallery').' - '.$this->tr('cpShop');?></div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('isShopStyle');?>
			<?php echo $form->labelEx($model,'isShopStyle'); ?>
			<?php echo $form->dropDownList($model, 'isShopStyle', array(false=>$this->tr('dontUseShop'), true=>$this->tr('useShop')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'isShopStyle');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('hCollectionShop');?>
			<?php echo $form->labelEx($model,'hCollectionShop'); ?>
			<?php echo $form->dropDownList($model, 'hCollectionShop', array(false=>$this->tr('vertical'), true=>$this->tr('horizontal')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'hCollectionShop');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('itemWidthCollectionShop');?>
			<?php echo $form->labelEx($model,'itemWidthCollectionShop'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'itemWidthCollectionShopSlider',
				'value'=>$model->itemWidthCollectionShop,
				'options'=>array(
					'min'=>50,
					'max'=>500,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_itemWidthCollectionShop").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'itemWidthCollectionShop', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'itemWidthCollectionShop');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('itemInfoShop');?>
			<?php echo $form->labelEx($model,'itemInfoShop'); ?>
			<?php echo $form->textArea($model,'itemInfoShop'); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'itemInfoShop');?>
		</div>
		<hr />
		<div class="row">
			<?php echo CHtml::button($this->tr('setStandardShop'), array('id'=>'setStandardShop', 'class'=>'fbCPButton'))?>
		</div>

	</div>


	<div id="setGalleryImageResize" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelGallery').' - '.$this->tr('cpImageResize');?></div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('imgWidth');?>
			<?php echo $form->labelEx($model,'imgWidth'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'imgWidthSlider',
				'value'=>$model->imgWidth,
				'options'=>array(
					'min'=>10,
					'max'=>1280,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_imgWidth").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'imgWidth', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'imgWidth');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('thWidth');?>
			<?php echo $form->labelEx($model,'thWidth'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'thWidthSlider',
				'value'=>$model->thWidth,
				'options'=>array(
					'min'=>10,
					'max'=>500,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_thWidth").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'thWidth', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'thWidth');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('quality');?>
			<?php echo $form->labelEx($model,'quality'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'qualitySlider',
				'value'=>$model->quality,
				'options'=>array(
					'min'=>0,
					'max'=>100,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_quality").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'quality', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'quality');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('sharpen');?>
			<?php echo $form->labelEx($model,'sharpen'); ?>
			<?php 	$this->widget('zii.widgets.jui.CJuiSlider', array(
				'id'=>'sharpenSlider',
				'value'=>$model->sharpen,
				'options'=>array(
					'min'=>0,
					'max'=>100,
					'slide'=>'js:function(event, ui) {
						$("#Cfg_sharpen").val(ui.value);
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:12px;width:140px;margin-top:4px;float:left; margin-right:12px;'
				),
			));?>
			<?php echo $form->textField($model,'sharpen', array('class'=>'valSlider', 'readonly'=>'readonly')); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'sharpen');?>
		</div>
	</div>

	<div id="setGalleryStructure" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelGallery').' - '.$this->tr('cpStructure');?></div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('gFolder');?>
			<?php echo $form->labelEx($model,'gFolder'); ?>
			<?php echo $form->textField($model,'gFolder'); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'gFolder');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('keepOriginal');?>
			<?php echo $form->labelEx($model,'keepOriginal'); ?>
			<?php echo $form->dropDownList($model, 'keepOriginal', array(false=>$this->tr('remove'), true=>$this->tr('keep')), array());?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'keepOriginal');?>
		</div>
	</div>

	<div id="setGalleryOptions" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelGallery').' - '.$this->tr('cpOptions');?></div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('useWysiwyg');?>
			<?php echo $form->labelEx($model,'useWysiwyg'); ?>
			<?php echo $form->dropDownList($model, 'useWysiwyg', array(false=>$this->tr('TextArea'),true=>$this->tr('WYSIWYG')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'useWysiwyg');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('usedTitle');?>
			<?php echo $form->labelEx($model,'usedTitle'); ?>
			<?php echo $form->dropDownList($model, 'usedTitle', array('filename' => $this->tr('filename'), 'pagetitle' => $this->tr('pagetitle'), 'predefined' => $this->tr('predefined')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'usedTitle');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('predefinedTitle');?>
			<?php echo $form->labelEx($model,'predefinedTitle'); ?>
			<?php echo $form->textArea($model,'predefinedTitle'); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'predefinedTitle');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('editorCreateAlbum');?>
			<?php echo $form->labelEx($model,'editorCreateAlbum'); ?>
			<?php echo $form->dropDownList($model, 'editorCreateAlbum', array(false=>$this->tr('editorNoCreate'), true=>$this->tr('editorCreate')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'editorCreateAlbum');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('editorOfOther');?>
			<?php echo $form->labelEx($model,'editorOfOther'); ?>
			<?php echo $form->dropDownList($model, 'editorOfOther', array(false=>$this->tr('onlyAuthor'), true=>$this->tr('editAllAlbums')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'editorOfOther');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('editorOperateCollection');?>
			<?php echo $form->labelEx($model,'editorOperateCollection'); ?>
			<?php echo $form->dropDownList($model, 'editorOperateCollection', array(false=>$this->tr('editorNoOperateCollection'), true=>$this->tr('editorOperateCollection')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'editorOperateCollection');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('editorSeeAllAlbums');?>
			<?php echo $form->labelEx($model,'editorSeeAllAlbums'); ?>
			<?php echo $form->dropDownList($model, 'editorSeeAllAlbums', array(false=>$this->tr('editorOnlyHisAlbums'), true=>$this->tr('editorSelectAllAlbums')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'editorSeeAllAlbums');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('coreScriptPosEnd');?>
			<?php echo $form->labelEx($model,'coreScriptPosEnd'); ?>
			<?php echo $form->dropDownList($model, 'coreScriptPosEnd', array( false=>$this->tr('pos_head'), true=>$this->tr('pos_end')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'coreScriptPosEnd');?>
		</div>
	</div>

	<div id="setGalleryLanguages" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPanelGallery').' - '.$this->tr('cpLanguages');?></div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('isMultilingual');?>
			<?php echo $form->labelEx($model,'isMultilingual'); ?>
			<?php echo $form->dropDownList($model, 'isMultilingual', array(false=>$this->tr('isNotMultilingual'), true=>$this->tr('isMultilingual')), array()); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'isMultilingual');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('defaultLanguage');?>
			<?php echo $form->labelEx($model,'defaultLanguage'); ?>
			<?php echo $form->textField($model,'defaultLanguage'); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'defaultLanguage');?>
		</div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('languages');?>
			<?php echo $form->labelEx($model,'languages'); ?>
			<?php echo $form->textField($model,'languages'); ?>
			<?php echo FBAdmin::getDefaultValue('gallery', 'languages');?>
		</div>
	</div>

	<div class="rowForButtons"><?php echo CHtml::ajaxSubmitButton($this->tr('saveGallery'), '', array('complete'=>'function(){$(".working").remove();}'), array('class'=>'fbCPButton'));?></div>

<?php $this->endWidget(); ?>
