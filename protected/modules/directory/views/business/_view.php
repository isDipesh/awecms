<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?></h2>
    <div class="left">
    <?php
    if (!empty($data->phone)) {
        ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
            </div>
            <div class="field_value">

                <?php
                echo $data->phone;
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
</div>
    <div class="right">
        <?php
        if (!empty($data->address)) {
            ?>
            <div class="field">
                <div class="field_name">
                    <b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
                </div>
                <div class="field_value">
                    <?php
                    echo nl2br($data->address);
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
                <div class="field_value">
                    <?php
                    echo CHtml::encode($data->district->name);
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>