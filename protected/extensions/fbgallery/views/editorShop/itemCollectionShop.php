<?php 
	$classItem =array(
		$this->conf->hCollectionShop ? 'itemCollectionFloat' : 'itemCollection',
		'sortableAlbum',
		!$item['checked'] ? 'notInCollection' : '',
	);

	if($this->conf->hCollectionShop)
	{
		$entryClass = 'entryShop clearfix';
		$mode = 'Float';
		$tagClass = 'tags';
	}
	else
	{
		$entryClass = 'entryShop entryShopVertical clearfix';
		$mode = '';
		$tagClass = 'vtags';
	}
?>
<div class="<?php echo $entryClass;?>">
	<div class="<?php echo implode(' ', $classItem);?>" data-pid="<?php echo $item['pid'];?>">
		<div class="selectorAlbum">
			<?php echo CHtml::checkbox($this->idPrefix.$item['pid'], $item['checked'], array('class'=>'populateCollection sttip', 'title'=>$this->tr('inCollection')));?> 
		</div>
		<div class="imageItem">
			<a class="redirector ttp" href="<?php echo $item['url'];?>" title="<?php echo $item['name'];?>" data-title="<?php echo $item['name'];?>">
				<img src="<?php echo $item['cover'];?>" alt="<?php echo $item['name'];?>" />
			</a>
		</div>
	</div>
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
</div>




