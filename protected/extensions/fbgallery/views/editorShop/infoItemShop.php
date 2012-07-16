<?php
	$infoAlbum=$this->getInfoAlbumOrCollection();
	$class = $this->conf->useWysiwyg ? 'inform area wysiwyg' : 'inform area';
?>

<div class="shopItemInfo">
	<div class="nameAlbum">
		<h2 id="<?php echo uniqid($this->idPrefix);?>" class="<?php echo $class;?>" data-pid="<?php echo 'name_'.$this->pid;?>" data-info="<?php echo $infoAlbum['name'];?>">
			<?php echo $infoAlbum['name'];?>
		</h2>
	</div>

	<div class="descriptionAlbum <?php echo $class;?>" data-pid="<?php echo 'description_'.$this->pid;?>" data-info="<?php echo $infoAlbum['description'];?>">
		<?php echo $infoAlbum['description'];?>
	</div>
	<div class="">
	<?php
		echo CHtml::label($this->tr('toComplete'),false, array('class'=>'tagsLabel'));
		echo ' '.__FILE__;
	?>
	</div>
	<div class="tags">
		<?php echo CHtml::label($this->tr('tagsLabel'),false, array('class'=>'tagsLabel')).': ';?>
		<?php echo '<div id="'.uniqid($this->idPrefix).'" class="tagsEdit area" data-pid="tags_'.$this->pid.'" data-info="'.$this->album->tags.'">'.$this->album->tags.'</div>';?>
	</div>
</div>
