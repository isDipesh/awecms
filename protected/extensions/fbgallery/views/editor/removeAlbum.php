<?php
	$info=operations::getInfoAlbumOrCollection();
	if($this->album)
	{ 
		$type = 'album';
		$function = 'removeAlbum';
	}
	else
	{
		$type = 'collection';
		$function = 'removeCollection';
	}

	$message = str_replace('{album}', $info['name'], $this->tr('confirmRemoveAlbumOrCollection'));
	$message = str_replace('{type}', $type, $message);

	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'dialogRemoveAlbumOrCollection',
		'options'=>array(
			'title'=>$this->tr($function),
			'autoOpen'=>false,
			'width'=>360,
			'resizable'=>false,
			'buttons' => array(
					$this->tr($function) =>'js:function(){
						$.post("'.Yii::app()->request->requestUri.'", "function='.$function.'", function(res){
							window.location.reload();
						});
					}',
					$this->tr("cancel")=>'js:function(){
						$(this).dialog("close")
					}',
				),
		),
		'htmlOptions'=>array('class'=>'hide'),
		'themeUrl'=>$this->url->juiThemeUrl,
		'theme'=>$this->juiTheme,
	));

		echo CHtml::tag('div', array("class"=>"containerMessage clearfix"), $message);

	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>