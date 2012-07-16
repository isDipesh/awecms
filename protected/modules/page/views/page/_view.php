<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->content)) {
        ?>
        <div class="field">
            <div class="field_value">
                <?php
                echo substr($data->content, 0, 500);
                if (strlen($data->content) > 525)
                    echo "...";
                else
                    echo substr($data->content, 500);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->views)) {
        ?>
        <div class="field">
            <?php echo CHtml::encode($data->getAttributeLabel('views')); ?>:
                <?php
                echo CHtml::encode($data->views);
                ?>
        </div>
        <?php
    }
    ?>
</div>