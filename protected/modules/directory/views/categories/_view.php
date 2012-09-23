<div class="view">

<h2><?php echo CHtml::link(CHtml::encode($data->page->title), array('view', 'id' => $data->id)); ?></h2>

    <?php
    echo $data->page->excerpt;
    ?>
</div>