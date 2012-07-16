<div class="itemCollection">
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

	<?php if($this->conf->showCoverTags){;?>
	<div class="tagsBox">
		<div class="tags">
			<?php echo CHtml::label($this->tr('tagsLabel'),false, array('class'=>'tagsLabel')).': ';?>
			<?php echo $item['tags'];?>
		</div>
	</div>
	<?php };?>

</div>