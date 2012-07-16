<div class="albumInfo">
	<div class="nameAlbum">
		<h2 id="<?php echo uniqid($this->idPrefix);?>" <?php echo $class;?> data-pid="<?php echo 'name_'.$this->pid;?>" data-info="<?php echo $infoAlbum['name'];?>">
			<?php echo $infoAlbum['name'];?>
		</h2>
	</div>
	<?php if(!$this->isShop):;?>
	<div class="descriptionAlbum"><h3<?php echo $class;?> data-pid="<?php echo 'description_'.$this->pid;?>" data-info="<?php echo $infoAlbum['description'];?>"><?php echo $infoAlbum['description'];?></h3></div>
	<?php endif;?>
</div>


