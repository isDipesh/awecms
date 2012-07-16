<?php
	$aItems;
	$cover = array();
	$infoItemCover;

	//if isn't set any cover, treat first image as cover
	if(!$arrItems[0]['cover'])
		$arrItems[0]['cover']= true;

	foreach($arrItems as $ind => $item)
		$aItems[] = $this->render('_item', array('item'=>$item), true);
?>
<?php if($this->beginCache('chache_'.$this->pid)):?>
	<div class="waitForGallery"></div>
	<div class="gcontainer clearfix">
		<?php
			$itemsOnLine = $this->conf->itemsOnLine;
			$existentsItems = count($aItems);
			if($existentsItems)
			{
				$ind = 0;
				$listed = 0;
				foreach($aItems as $k => $item)
				{
					if($ind == 0) 
						echo '<div class="fbgrow clearfix">';
					echo $item;
					$listed++;
					$ind++;
					if($ind === (int)$itemsOnLine || $listed === $existentsItems)
					{
						echo '</div>';
						$ind = 0;
					}
				}
			unset($arrItems);
			unset($aItems);
			}
			else
				echo $this->tr('emptyGallery');
		?>
		<?php if($this->conf->showAlbumTags){;?>
			<div class="tagsAlbum">
				<div class="tags">
					<?php echo CHtml::label($this->tr('tagsLabel'),false, array('class'=>'tagsLabel')).': ';?>
					<?php echo $this->album->tags;?>
				</div>
			</div>
		<?php };?>
	</div>
<?php $this->endCache();endif;?>
