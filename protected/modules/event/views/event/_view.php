<div class="view">
    <?php
    if (isset($data->start)) {
        ?>
        <div class="date">
            <p>
                <?php echo date('d', strtotime($data->start)); ?>
                <span>
                    <?php echo date('M', strtotime($data->start)); ?>
                </span>
            </p>
        </div>
    <?php }
    ?>

    <div class="date-content">

        <?php
        $this->widget('PageItem', array(
            'data' => $data,
            'fields' => array('title', 'content')
        ));
        ?>

        <?php
        if (isset($data->venue)) {
            echo CHtml::encode($data->getAttributeLabel('venue'));
            ?>:
            <?php
            echo CHtml::encode($data->venue);
        }
        ?>

        <br/>
        <?php
        if (isset($data->start)) {
            echo CHtml::encode($data->getAttributeLabel('start'));
            ?>:
            <?php
            echo date('D, d M Y H:i:s', strtotime($data->start));
        }
        ?>

        <br/>
        <?php
        if (isset($data->end)) {
            echo CHtml::encode($data->getAttributeLabel('end'));
            ?>:
            <?php
            echo date('D, d M Y H:i:s', strtotime($data->end));
        }
        ?>


    </div>
</div>