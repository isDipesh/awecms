<div class="waitForGallery"></div>

<?php 
	$sortableItems;
	$cover = array();
	//if isn't set any cover, treat first image as cover
	if(!$arrItems[0]['cover'])
		$arrItems[0]['cover']=true;
	foreach($arrItems as $id => $item)
		$sortableItems['imgS'.$id] = $this->render('editor/item', array('item'=>$item), true);
	unset($arrItems);
?>
<?php if($this->beginCache('chache_sortable'.$this->pid)):?>
<div class="gcontainer clearfix">
	<?php
		if(count($sortableItems))
		{
			$this->widget('zii.widgets.jui.CJuiSortable', array(
				'items'=>$sortableItems,
				'id'=>'sortable_container',
				'options'=>array(
					'delay'=>'300',
						'stop' => "js: function(){
							var ids = new Array;
							var urls = $(this).find('a.gImg');
							$(urls).each(function(){
								var a = $(this).attr('href').split('/');
								var l = a.length;
								ids.push(a[l-1]);
							});
							$.post('".Yii::app()->request->requestUri."', 'function=newImgOrder&order='+ids);
						}"
				),
				'htmlOptions'=>array(
					'class' => 'clearfix',
				),
			));
		}
	?>

	<div class="tagsAlbum">
		<div class="tags">
			<?php echo CHtml::label($this->tr('tagsLabel'),false, array('class'=>'tagsLabel')).': ';?>
			<?php echo '<div id="'.uniqid($this->idPrefix).'" class="tagsEdit area" data-pid="tags_'.$this->pid.'" data-info="'.$this->album->tags.'">'.$this->album->tags.'</div>';?>
		</div>
	</div>
	
	<?php $this->render('editor/deleteConfirmationDialog');?>
</div>

<?php $this->endCache();endif;?>










