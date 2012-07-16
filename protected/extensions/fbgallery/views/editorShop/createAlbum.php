<?php
	$onlyAlbum = $this->conf->editorCreateAlbum && !$this->conf->editorOperateCollection;
	$onlyCollection = $this->conf->editorOperateCollection && !$this->conf->editorCreateAlbum;
	$albumAndCollection = $this->conf->editorCreateAlbum && $this->conf->editorOperateCollection;

	if($onlyAlbum) 
		$title = $this->tr("createNewAlbum");
	if($onlyCollection)
		$title = $this->tr("createNewCollection");
	if($albumAndCollection)
		$title = $this->tr("createAlbumOrCollection");

	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'dialogNewAlbum',
		'options'=>array(
			'title'=>$title,
			'autoOpen'=>false,
			'width'=>'auto',
			'maxWidth'=>720,
			'resizable'=>true,
			'buttons' => array(
					$this->tr("create") =>'js:function(){
						var complete=true;
						$(".err").removeClass(".err");
						$(".inputNewAlbum").each(function(){
							if($(this).val() == ""){
								$(this).addClass("err")
								complete = false;
							}
						});
					if(complete){
						$(this).after("<div class=\"working\"></div>");
						$.post("'.Yii::app()->request->requestUri.'", "function=newAlbum&"+($("#form_create").serialize()), function(res){
							window.location.reload();
						});
					}

					}',
					$this->tr("cancel")=>'js:function(){
						$(".err").removeClass(".err");
						$(this).dialog("close")
					}',
				),
			'open'=>'js:function(){
					$(".err").removeClass("err");
					$(".formCPFB").show();
					$(".cle").focus(function(){
						$(this).cleditor({
							controls:"bold italic underline strikethrough | " +
								"alignleft center alignright justify | undo redo | " +
								"link unlink | cut copy paste pastetext | source",
							width:290, 
							height:200, 
							useCSS:false
						}).focus();
					});
				}',
		),
		'htmlOptions'=>array('class'=>'hide'),
		'themeUrl'=>$this->url->juiThemeUrl,
		'theme'=>$this->juiTheme,
	));
?>
	<form id="form_create">
	<div class="newAlbumContainer containerMessage clearfix">
	<?php if($albumAndCollection || $onlyCollection || $this->levelAccess === 2):?>
		<div class="selectForCollection clearfix">
		<div class="row">
			<?php 
				if($onlyCollection && $this->levelAccess !== 2)
				{
					echo CHtml::hiddenField('isCollection', true);
					echo $this->tr('isCollection');
				}
				else
					echo CHtml::CheckBox('isCollection', false, array('class'=>'isCollection shopCollection')).' '.$this->tr('isCollection');
			?>
		</div>
		</div>
	<?php endif;?>
		<div class="createACLangs clearfix">
		<?php foreach($this->lang->all as $language){?>
			<div class="newAlbumLangContainer clearfix">
				<div class="row">
					<?php echo operations::flag($language).' '.CHtml::label($this->tr("newAlbumName") , 'newAlbumName', array( )); ?>
					<br />
					<?php echo CHtml::textField('newAlbumName_'.$language, '', array('class'=>'inputNewAlbum'));?>
				</div>
				<div class="row">
					<?php echo operations::flag($language).' '.CHtml::label($this->tr("newAlbumDescription"), 'newAlbumDescription', array( )); ?>
					<br />
					<?php echo CHtml::textArea('newAlbumDescription_'.$language, shop::predefinedItemDescriptionShop($language), array('class'=>'inputNewAlbum descriptionNewAlbum cle', 'data-info'=>''));?>
				</div>
			</div>
		<?php } ;?>
		</div>
		<div class="tagsNewGallery clearfix">
			<div class="row">
				<?php echo CHtml::label($this->tr("tags") , 'newAlbumTags', array( )); ?>
				<?php echo '<div class="leftCharsTag">256</div>';?>
				<br />
				<?php echo CHtml::textArea('newAlbumTags', '', array('class'=>'inputNewAlbum newAlbumTags'));?>
			</div>
		</div>
	</div>
	</form>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
