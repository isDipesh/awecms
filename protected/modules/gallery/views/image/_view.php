<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?></h2>

    <a href="<?php echo Yii::app()->createUrl('/gallery/data/view', array('id' => $data->id)); ?>">
        <img width="100" height="100" src="<?php echo $data->url; ?>" alt="<?php echo $data->title; ?>">
    </a>
    <br/>
    <?php echo $data->description; ?>

</div>