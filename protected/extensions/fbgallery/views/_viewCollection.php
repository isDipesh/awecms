<?php if($this->beginCache('chache_'.$this->pid)):?>
<div class="waitForGallery"></div>
<div class="gcontainer clearfix hide">
	<?php
		$itemsOnLine = $this->conf->itemsOnLine;
		$existentsItems = count($items);
		if($existentsItems)
		{
			$ind = 0;
			$listed = 0;
			foreach($items as $item)
			{
				if($ind == 0) 
					echo '<div class="fbgrow clearfix">';
				echo $this->render('_itemCollection', array('item'=>$item));
				$listed++;
				$ind++;
				if($ind === (int)$itemsOnLine || $listed === $existentsItems)
				{
					echo '</div>';
					$ind = 0;
				}
			}
		}
		else
			echo $this->tr('noAlbum');
	?>
	<?php if($this->conf->showCollectionTags){;?>
		<div class="tagsAlbum">
			<div class="tags">
				<?php echo CHtml::label($this->tr('tagsLabel'),false, array('class'=>'tagsLabel')).': ';?>
				<?php echo $this->conf->combinedAlbumsTags ? Collect::combineAlbumsTagOfCollection() : $this->collection->tags;?>
			</div>
		</div>
	<?php };?>
</div>
<?php $this->endCache();endif;?>