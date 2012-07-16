<?php if(Yii::app()->user->hasFlash('succes')): ?><div class="flash-success"><?php echo Yii::app()->user->getFlash('succes'); ?></div><?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')): ?><div class="flash-error"><?php echo Yii::app()->user->getFlash('error'); ?></div><?php endif; ?>

<?php
	$this->beginWidget('zii.widgets.jui.CJuiDraggable', array(
		'id'=>'containerCPFB',
		'htmlOptions'=>array('class'=>'containerCPFB'),
	));
?>
		<div class="cpanelToggle"></div>

		<div class="cpanelFB clearfix">
			<?php if($this->album):?>
				<div id="loadFile" class="rowFBCp load_files"><?php echo $this->tr('loadFile');?></div>
				<div id="deleteChecked" class="rowFBCp delete_checked"><?php echo $this->tr('deleteChecked');?></div>
				<div id="clearGallery" class="rowFBCp empty_gallery"><?php echo $this->tr('clearGallery');?></div>
			<?php endif;?>


			<?php 
// 				if($this->levelAccess === 1)
					echo $this->render('editor/cpContext');
			?>

			<?php if($this->levelAccess === 2):?>
				<div class="adminCpFb"><?php echo $this->tr('administrator');?></div>
				<div id="showCPanel" class="rowFBCp showCPanelAdmin"><?php echo $this->tr('cPanel');?></div>
				<?php CController::renderPartial('administrator/cpAdmin');?>
			<?php endif;?>
		</div>

<?php $this->endWidget();?>

<?php $this->album || $this->collection ? $this->render('editor/removeAlbum') : $this->render(!$this->isShop ? 'editor/createAlbum':'editorShop/createAlbum');?>















