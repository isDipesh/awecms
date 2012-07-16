<?php 
	
	$editorOperateCollection = $this->conf->editorOperateCollection;
	$editorCreateAlbum = $this->conf->editorCreateAlbum;
	$isAdmin = $this->levelAccess === 2;
	$isEditor = $this->levelAccess === 1;

	//included widget but not created album or collection
	if(!$this->album && !$this->collection)
	{
		if($isAdmin)
			echo CHtml::tag('div', array('id'=>'createAlbum', 'class'=>'rowFBCp create_album'), $this->tr('newAlbumOrCollection'));

		if($isEditor)
		{
			if($editorCreateAlbum && $editorOperateCollection)
				echo CHtml::tag('div', array('id'=>'createAlbum', 'class'=>'rowFBCp create_album'), $this->tr('newAlbumOrCollection'));
			if($editorCreateAlbum && !$editorOperateCollection)
				echo CHtml::tag('div', array('id'=>'createAlbum', 'class'=>'rowFBCp create_album'), $this->tr('createNewAlbum'));
			if(!$editorCreateAlbum && $editorOperateCollection)
				echo CHtml::tag('div', array('id'=>'createAlbum', 'class'=>'rowFBCp create_album'), $this->tr('createNewCollection'));
		}
	}
	
	//we have album, add button for removing
	if($this->album)
		if($editorCreateAlbum || $isAdmin)
			echo CHtml::tag('div', array('id'=>'removeAlbum', 'class'=>'rowFBCp remove_album'), $this->tr('removeAlbum'));

	//we have collection add button for removing
	if($this->collection)
		if($editorOperateCollection || $isAdmin)
			echo CHtml::tag('div', array('id'=>'removeCollection', 'class'=>'rowFBCp remove_collection'), $this->tr('removeCollection'));
?>