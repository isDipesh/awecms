<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->content)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->content);
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
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('is_widget')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->is_widget == 1 ? 'True' : 'False');
                ?>

            </div>
        </div>
    <?php
    if (!empty($data->widget_class)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('widget_class')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->widget_class);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->tag_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tag_name')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->tag_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->html_options)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('html_options')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->html_options);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->decoration_css_class)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('decoration_css_class')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->decoration_css_class);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->title_css_class)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('title_css_class')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->title_css_class);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->content_css_class)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('content_css_class')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->content_css_class);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('hide_on_empty')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->hide_on_empty == 1 ? 'True' : 'False');
                ?>

            </div>
        </div>
    <?php
    if (!empty($data->skin)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('skin')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->skin);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>