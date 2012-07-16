<?php $form=$this->beginWidget('CActiveForm', array('id'=>'cfgCollection', 'enableAjaxValidation'=>true));
	echo Chtml::hiddenField("scenario", $model->scenario);?>

	<div id="setCollectionAspect" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('cPaneCollection').' - '.$this->tr('cpAppearance');?></div>

		<div class="row">
			<?php echo FBAdmin::helpTooltip('showCollectionTitle');?>
			<?php echo $form->labelEx($model,'showCollectionTitle'); ?>
			<?php echo $form->dropDownList($model, 'showCollectionTitle', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('collection', 'showCollectionTitle');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('showCollectionDescription');?>
			<?php echo $form->labelEx($model,'showCollectionDescription'); ?>
			<?php echo $form->dropDownList($model, 'showCollectionDescription', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('collection', 'showCollectionDescription');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('showCollectionTags');?>
			<?php echo $form->labelEx($model,'showCollectionTags'); ?>
			<?php echo $form->dropDownList($model, 'showCollectionTags', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('collection', 'showCollectionTags');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('combinedAlbumsTags');?>
			<?php echo $form->labelEx($model,'combinedAlbumsTags'); ?>
			<?php echo $form->dropDownList($model, 'combinedAlbumsTags', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('collection', 'combinedAlbumsTags');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('showCoverName');?>
			<?php echo $form->labelEx($model,'showCoverName'); ?>
			<?php echo $form->dropDownList($model, 'showCoverName', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('collection', 'showCoverName');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('showCoverDescription');?>
			<?php echo $form->labelEx($model,'showCoverDescription'); ?>
			<?php echo $form->dropDownList($model, 'showCoverDescription', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('collection', 'showCoverDescription');?>
		</div>
		<div class="row">
			<?php echo FBAdmin::helpTooltip('showCoverTags');?>
			<?php echo $form->labelEx($model,'showCoverTags'); ?>
			<?php echo $form->dropDownList($model, 'showCoverTags', array(false=>$this->tr('no'),true=>$this->tr('yes'))); ?>
			<?php echo FBAdmin::getDefaultValue('collection', 'showCoverTags');?>
		</div>
	</div>

	<div class="rowForButtons"><?php echo CHtml::ajaxSubmitButton($this->tr('saveCollection'), '', array('complete'=>'function(){$(".working").remove();}'), array('class'=>'fbCPButton'));?></div>

<?php $this->endWidget(); ?>