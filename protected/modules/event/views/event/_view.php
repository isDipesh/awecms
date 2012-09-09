<div class="view">
    <?php
    if (isset($data->start)) {
        ?>
        <div class="date">
            <div>
                <?php echo date('d', strtotime($data->start)); ?>
                <span>
                    <?php echo date('M', strtotime($data->start)); ?>
                </span>
            </div>
        </div>
    <?php }
    ?>

    <div class="event-details-list left">

        <?php
        $this->widget('PageItem', array(
            'data' => $data,
            'fields' => array('title')
        ));
        ?>
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
        
        <?php
        if (isset($data->venue)) {
            ?>
            <div class="event-list-venue right">
            <?php
            echo CHtml::encode($data->getAttributeLabel('venue'));
            ?>:
            <?php
            echo nl2br($data->venue);
            ?>
            </div>
        <?php
        }
        ?>

</div>