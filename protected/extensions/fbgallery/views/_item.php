<div class="gTh">
	<?php if($item['thTitleShow']): ?>
		<div class="gThTitle">
			<?php echo $item['title'];?>
		</div>
	<?php endif;?>

	<div class="imageItem">
		<a class="gImg ttp" rel="<?php echo $item['rel'];?>" title="<?php echo $item['title'];?>" href="<?php echo $item['urlImg'];?>">
			<img src="<?php echo $item['imgSrc'];?>" alt="<?php echo $item['title'];?>" />
		</a>
	</div>

	<?php if($item['useInfoBox']):?>
		<div class="infoItem"><?php echo CHtml::decode($item['title']);?></div>
	<?php endif;?>
</div>
