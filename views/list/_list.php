<?php if($index==0):?>
	<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th colspan="3" style="text-align: center;"><= Actions =></th>
		</tr>
	</thead>
<?php endif;?> 
<tr class="<?php echo ($data->id==$id)?"active":"";?>">
	<td>
		<?php echo $data->title;?>
	</td>
	<td>
		<?php echo $data->description;?>
	</td>
	<td class="act-td">
		<a href="<?php echo $this->createUrl('/menu/items/list',array('id'=>$data->id));?>"><?php echo MenuModule::t("Items",array(),"actions");?></a>
	</td>
	<td class="act-td">
		<a href="<?php echo $this->createUrl('/menu/edit/edit',array('id'=>$data->id));?>"><?php echo MenuModule::t("Edit",array(),"actions");?></a>
	</td>
	<td class="act-td">
		<a href="#"><?php echo MenuModule::t("Remove",array(),"actions");?></a>
	</td>
</tr>