<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('path')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->path), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->page->title)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('page_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->page->title);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>