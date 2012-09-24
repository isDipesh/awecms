<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->phone)) {
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
    if (!empty($data->website)) {
        ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
            </div>
            <div class="field_value">

                <?php
                echo Awecms::formatUrl($data->website, true);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->address)) {
        ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
            </div>
            <div class="field_value">

                <?php
                echo CHtml::encode($data->address);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->place->other_names)) {
        ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('place_id')); ?>:</b>
            </div>
            <div class="field_value">

                <?php
                echo CHtml::encode($data->place->other_names);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->district->name)) {
        ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('district_id')); ?>:</b>
            </div>
            <div class="field_value">

                <?php
                echo CHtml::encode($data->district->name);
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
                <img alt="<?php echo $data->phone ?>" title="<?php echo $data->phone ?>" src="<?php echo $data->image ?>" /></div></div>
        <?php
    }
    ?>
</div>