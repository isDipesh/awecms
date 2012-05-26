<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->birthdate)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('birthdate')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->birthdate));
                ?>

        </div>
        </div>

        <?php
    }
    ?>
    <?php
    if (!empty($data->birthtime)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('birthtime')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->birthtime));
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
    if (!empty($data->status)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->status);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->slogan)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('slogan')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->slogan);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->content)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo nl2br($data->content);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->created_at)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->created_at));
                ?>

        </div>
        </div>

        <?php
    }
    ?>
    <?php
    if (!empty($data->changed_at)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('changed_at')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->changed_at));
                ?>

        </div>
        </div>

        <?php
    }
    ?>
    <?php
    if (!empty($data->modified_at)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('modified_at')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->modified_at));
                ?>

        </div>
        </div>

        <?php
    }
    ?>
    <?php
    if (!empty($data->image)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
            </div>
<div class="field_value">
<img alt="<?php echo $data->name ?>" title="<?php echo $data->name ?>" src="<?php echo $data->image ?>" /></div></div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->email)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::mailto($data->email);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->uri)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('uri')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo Awecms::formatUrl($data->uri,true);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->qualification)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('qualification')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->qualification);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>