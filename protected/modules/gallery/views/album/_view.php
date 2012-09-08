<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></h2>

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
    <?php
    if (!empty($data->thumbnail->id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->thumbnail->id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>