<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'dialogDeleteConfirmation',
		'options'=>array(
			'dialogClass'=>'hidden',
			'autoOpen'=>false,
			'resizable'=>false,
			'width'=>440,
		),
		'themeUrl'=>$this->url->juiThemeUrl,
		'theme'=>$this->juiTheme,
	));
?>
	<div class="containerMessage">
		<div class="msg hide"></div>
	</div>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
