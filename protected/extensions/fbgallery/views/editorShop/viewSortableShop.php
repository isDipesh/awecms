<?php if($this->beginCache('chache_sortable'.$this->pid)):?>
<div class="waitForGallery"></div>
	<div class="containerArticolShop clearfix">
		<div class="gcontainer clearfix">
			<div class="shopItemImages clearfix">
				<div class="coverItem clearfix">
					<?php $this->render('editorShop/coverShop', array('item'=>$cover));?>
				</div>
				<?php
					if(count($aItems))
					{
						$this->widget('zii.widgets.jui.CJuiSortable', array(
							'items'=>$aItems,
							'id'=>'sortable_container',
							'options'=>array(
								'delay'=>'300',
									'stop' => "js: function(){
										var ids = new Array;
										var urls = $('.gcontainer').find('a.gImg');
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
						$this->render('editor/deleteConfirmationDialog');
					}
					unset($sortableItems);
				?>
			</div>
			<?php 
				$this->render('editorShop/infoItemShop', array('info'=>$info));
				unset($aItems, $cover, $info);
			?>
		</div>
	</div>

<?php $this->endCache();endif;?>










