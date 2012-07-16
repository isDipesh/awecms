<?php 
	if($this->conf->hCollectionShop)
	{
		$mode = 'Float';
		$class = 'itemCollectionFloat';
		$entryClass = 'entryShop clearfix';
		$tagClass = 'tags';
	}
	else
	{
		$mode = '';
		$class = 'itemCollection';
		$entryClass = 'entryShopVertical clearfix';
		$tagClass = 'vtags';
	}
?>

<div class="<?php echo $entryClass;?>">
	<div class="<?php echo $class;?>">
		<div class="imageItem">
			<a class="redirector ttp" href="<?php echo $item['url'];?>" title="<?php echo $item['description'];?>" data-title="<?php echo $item['description'];?>">
				<img src="<?php echo $item['cover'];?>" alt="<?php echo $item['description'];?>" />
			</a>
		</div>
	</div>
<!-- if don't display any information, we don't inset container for its -->
<?php if($this->conf->showCoverName || $this->conf->showCoverDescription || $this->conf->showCoverTags){;?>
	<div class="infoEntryShop<?php echo $mode;?> clearfix">
		<?php if($this->conf->showCoverName){;?>
			<div class="nameEntryShop<?php echo $mode;?>">
				<?php echo $item['name'];?>
			</div>
		<?php };?>
		<?php if($this->conf->showCoverDescription){;?>
			<div class="infoCollection<?php echo $mode;?>">
				<?php echo $item['description'];?>
			</div>
		<?php };?>
		<?php if($this->conf->showCoverTags){;?>
			<div class="<?php echo $tagClass;?>">
				<?php echo CHtml::label($this->tr('tagsLabel'),false, array('class'=>'tagsLabel')).': ';?>
				<?php echo $item['tags'];?>
			</div>
		<?php };?>
	</div>
<?php };?>
</div>