
<?php if($this->beginCache('chache_'.$this->pid)):?>
<div class="waitForGallery"></div>
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

	<div class="tagsAlbum">
		<div class="tags">
			<?php echo CHtml::label($this->tr('tagsLabel'),false, array('class'=>'tagsLabel')).': ';?>
			<?php echo '<div id="'.uniqid($this->idPrefix).'" class="tagsEdit area" data-pid="tags_'.$this->pid.'" data-info="'.$this->collection->tags.'">'.$this->collection->tags.'</div>';?>
		</div>
	</div>


	</div>

<?php $this->endCache();endif;?>
