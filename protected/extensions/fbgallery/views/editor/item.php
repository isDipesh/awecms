<?php 
	$titleEditor = $this->conf->useWysiwyg ? 'edonplace area wysiwyg' : 'edonplace area';
	$coverClass = $item['cover'] ? 'coverSelected':'';
	$albumCover = $item['cover'] ? ' albumCover':'';
?>

<div class="gTh<?php echo $albumCover;?>">
		<?php if($item['thTitleShow']): ?>
			<div class="gThTitle">
				<?php echo $item['title'];?>
			</div>
		<?php endif;?>

		<div class="fbitem_tools">
			<div class="checkbox_delete ttp" title="<?php echo $this->tr('checkToDelete');?>">
				<?php echo CHtml::checkbox(uniqid('check_'), false, array('class'=>'checked_img', 'data-filename'=>$item['fileName']));?>
			</div>
			<div class="deleteIcon ttp" title="<?php echo $this->tr('clickDelete');?>"></div>
			<div class="coverIcon <?php echo $coverClass;?> ttp" title="<?php echo $this->tr('setCover');?>"></div>
			<div id="<?php echo uniqid($this->idPrefix);?>" 
				class="editIcon ttp <?php echo $titleEditor;?>" 
				data-info="<?php echo $item['title'];?>"
				data-file="<?php echo $this->idPrefix.$item['fileName'];?>"
				title="<?php echo $this->tr('clickEditTitle');?>">
			</div>
		</div>
		
		<div class="imageItem">
			<a class="gImg ttp" rel="<?php echo $item['rel'];?>" title="<?php echo $item['title'];?>" href="<?php echo $item['urlImg'];?>">
				<img src="<?php echo $item['imgSrc'];?>" alt="<?php echo $item['title'];?>" />
			</a>
		</div>

		<?php if($item['useInfoBox']):?>
			<div class="infoItem"><?php echo htmlspecialchars_decode($item['title']);?></div>
		<?php endif;?>
</div>