<?php if($this->beginCache('chache_'.$this->pid)):?>
<div class="waitForGallery"></div>
<div class="containerArticolShop clearfix">
	<div class="gcontainer clearfix hide">
		<?php
			$this->widget('zii.widgets.jui.CJuiSortable', array(
				'items'=>$arrItems,
				'id'=>'sortable_container',
				'options'=>array(
					'delay'=>'300',
						'stop' => "js: function(){
							var pids = new Array;
							var sort = $('.sortableAlbum').not('.notInCollection');

							$(sort).each(function(){
								pids.push($(this).data('pid'));
							});
							$.post('".Yii::app()->request->requestUri."', 'function=newAlbumsOrder&order='+pids.join(','));
						}"
				),
				'htmlOptions'=>array(
					'class' => 'clearfix',
				),
			));
		?>
	</div>
</div>
<?php $this->endCache();endif;?>

