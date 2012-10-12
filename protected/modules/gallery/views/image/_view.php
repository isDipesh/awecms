<div class="img-view-block">

    <a href="<?php echo Yii::app()->createUrl('gallery/image/view', array('id' => $data->id)); ?>">
        <img  height="120" src="<?php echo $data->url; ?>" alt="<?php echo $data->title; ?>" title="<?php echo CHtml::encode($data->title); ?>">
    </a>
    <br/>
    <?php  if($data->description){
    	echo $data->description;
    }?>

</div>