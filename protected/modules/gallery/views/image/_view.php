<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?></h2>

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
    if (!empty($data->album->id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('album_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->album->id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->file)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('file')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->file);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->mime_type)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('mime_type')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->mime_type);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->size)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->size);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>