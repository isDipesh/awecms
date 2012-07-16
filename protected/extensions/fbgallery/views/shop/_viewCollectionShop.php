<?php $class =  $this->conf->hCollectionShop ? 'gcontainer': 'gcontainer fullWidth';?>
<div class="waitForGallery"></div>
<div class="<?php echo $class;?> clearfix hide">
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

				echo $this->render('shop/_itemCollectionShop', array('item'=>$item));
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
</div>
