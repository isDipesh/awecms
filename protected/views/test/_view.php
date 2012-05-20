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
                $datetime = strtotime($data->birthdate);
                $mysqldate = date('D, d M y H:i:s', $datetime);
                echo $mysqldate;
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
                $datetime = strtotime($data->birthtime);
                $mysqldate = date('D, d M y H:i:s', $datetime);
                echo $mysqldate;
                ?>

            </div>
        </div>

        <?php
    }
    ?>
    <?php
    if (!empty($data->enabled)) {
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
    }
    ?>
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
                echo CHtml::encode($data->content);
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
                $datetime = strtotime($data->created_at);
                $mysqldate = date('D, d M y H:i:s', $datetime);
                echo $mysqldate;
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
                $datetime = strtotime($data->changed_at);
                $mysqldate = date('D, d M y H:i:s', $datetime);
                echo $mysqldate;
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
                <a href="\<?php echo $data->image ?>" target="_blank" ><img alt="\<?php echo $data->name ?>" title="<?php echo $data->name ?>" src="<?php echo $data->image ?>" /></a>
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
                echo CHtml::encode($data->email);
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
                echo CHtml::encode($data->uri);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>