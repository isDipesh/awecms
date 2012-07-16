<?php
	$infoAlbum=$this->getInfoAlbumOrCollection();
	$class = $this->conf->useWysiwyg ? 'inform' : 'inform area';
?>
<div class="shopItemInfo">
	<div class="nameAlbum"><h2><?php echo $infoAlbum['name'];?></h2></div>

	<div class="descriptionAlbum"><?php echo $infoAlbum['description'];?></div>

	<div class="tags">
		<?php echo CHtml::label($this->tr('tagsLabel'),false, array('class'=>'tagsLabel')).': ';?>
		<?php echo $this->album->tags;?>
	</div>
</div>
