<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'dialogCPAdministrator',
		'options'=>array(
			'title'=>$this->tr('cpanel'),
			'dialogClass'=>'hidden',
			'autoOpen'=>false,
			'width'=>720,
			'resizable'=>false,
		),
		'htmlOptions'=>array(
			'class'=>'fbCPAdminBox'
		),
		'themeUrl'=>$this->url->juiThemeUrl,
		'theme'=>$this->juiTheme,
	));

	$this->render('administrator/cpMenu');

	echo '<div class="fbCPanelRightColumn clearfix">';
		echo '<div class="formCPFB fbSettingDetails clearfix">';
			$this->render('administrator/cpGalleryForm', array('model'=>operations::cfgModel('gallery')));
			$this->render('administrator/cpAlbumForm', array('model'=>operations::cfgModel('album')));
			$this->render('administrator/cpCollectionForm', array('model'=>operations::cfgModel('collection')));
			$this->render('administrator/cpFancyBoxForm', array('model'=>operations::cfgModel('fancybox')));
			$this->render('administrator/cpUploaderForm', array('model'=>operations::cfgModel('uploader')));

			$this->render('administrator/loadDefaultConfiguration');
		echo '</div>';
	echo '</div>';

	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
