<div class="itemCollection <?php echo $this->levelAccess ? 'sortableAlbum':'';?> <?php echo ($this->levelAccess && !$item['checked']) ? 'notInCollection':'';?>" data-pid="<?php echo $item['pid'];?>">
	<?php if($this->levelAccess):?>
		<div class="selectorAlbum">
			<?php echo CHtml::checkbox($this->idPrefix.$item['pid'], $item['checked'], array('class'=>'populateCollection sttip', 'title'=>$this->tr('inCollection')));?> 
		</div>
	<?php endif;?>

	<div class="imageItem">
		<a class="redirector ttp" href="<?php echo $item['url'];?>" title="<?php echo $item['name'];?>" data-title="<?php echo $item['name'];?>">
			<img src="<?php echo $item['cover'];?>" alt="<?php echo $item['name'];?>" />
		</a>
	</div>

	<?php if($this->conf->showCoverName):?>
		<div class="nameAlbumCollection"><?php echo $item['name'];?></div>
	<?php endif;?>

	<?php if($this->conf->showCoverDescription):?>
		<div class="infoCollection">
			<?php echo $item['description'];?>
		</div>
	<?php endif;?>
</div>