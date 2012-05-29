<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->menu->name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->menu->name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->parent->name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->parent->name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->depth)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('depth')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->depth);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->left)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('left')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->left);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->right)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('right')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->right);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->enabled == 1 ? 'True' : 'False');
                ?>

            </div>
        </div>
    <?php
    if (!empty($data->content_id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('content_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->content_id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->description)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->description);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->link)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo Awecms::formatUrl($data->link,true);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>