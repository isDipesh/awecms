<div class="waitForGallery"></div>
<?php if($this->beginCache('chache_sortable'.$this->pid)):?>
<div class="containerArticolShop clearfix">
	<div class="gcontainer clearfix">
		<div class="shopItemImages clearfix">
			<div class="coverItem clearfix">
				<?php $this->render('shop/_coverShop', array('item'=>$cover));?>
			</div>
			<?php
				if(count($aItems))
					foreach($aItems as $item)
						$this->render('shop/_itemShop', array('item'=>$item));
			?>
		</div>
		<?php 
			$this->render('shop/_infoItemShop', array('info'=>$info));
			unset($aItems, $cover, $info);
		?>
	</div>
</div>
<?php $this->endCache();endif;?>