<div class="waitForGallery"></div>
<div class="gcontainer clearfix">
	<?php
		$start = $pages->currentPage * $this->conf->itemsOnPaginate;
		$end = ($start + $this->conf->itemsOnPaginate) > $pages->getItemCount() ? $pages->getItemCount(): $start + $this->conf->itemsOnPaginate;
		for($i=$start;$i<$end;$i++)
			echo $this->render('_item', array('item'=>$data[$i]));
	?>
</div>

<div class="pager">
	<?php $this->widget('CLinkPager', array(
		'pages'=>$pages, 
		'nextPageLabel'=>'>>', 
		'prevPageLabel'=>'<<',
	));
 ?>
</div>
