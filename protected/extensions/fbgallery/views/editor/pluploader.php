<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'dialogUploader',
		'options'=>array(
			'title'=>'Uploader',
			'dialogClass'=>'hidden',
			'autoOpen'=>false,
			'width'=>640,
			'resizable'=>false
		),
		'themeUrl'=>$this->url->juiThemeUrl,
		'theme'=>$this->juiTheme,
	));
?>
 	<div class="fbguploader">
		<div id="uploader">
			<p><?php echo $this->tr('browserUnable');?></p>
		</div>

		<?php if($this->conf->max != -1):?>
			<div class="loadMoreFiles"><?php echo $this->tr('canUpload').' ';?>
				<span class="moreFiles"></span><?php echo ' '.$this->tr('file-s');?>
			</div>
		<?php endif;?>
	</div>


<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>


