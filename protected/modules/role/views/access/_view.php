<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('module')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->module), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->controller)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('controller')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->controller);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->action)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->action);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>