	<div id="confirmationLoadDefault" class="containerMessage displaySetting">
		<div class="titleCategoryRow"><?php echo $this->tr('loadDefaultConfiguration');?> <span class="configType"></span>?</div>
		<?php echo CHtml::tag('div', array('class'=>'questionLoadDefault'), $this->tr('doYouLoadDefault'));?>
	</div>

	<div class="rowForButtons">
		<?php echo CHtml::button($this->tr('loadDefault'), array('class'=>'fbCPButton loadDefaultConf', 'data-type'=>'', 'data-value'=>$this->tr('loadDefault')));?>
	</div>
