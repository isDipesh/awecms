<div class="view" itemscope itemtype="http://schema.org/Event">
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

        <h2>
            <a itemprop="url" href="<?php echo Yii::app()->createUrl('/event/event/view', array('id' => $data->id)); ?>">
                <span itemprop="name"><?php echo CHtml::encode($data->title); ?></span>
            </a>
        </h2>
        <?php
        if (isset($data->start)) {
            echo CHtml::encode($data->getAttributeLabel('start'));
            ?>:
            <?php
            echo '<meta itemprop="startDate" content="' . date('Y-m-d\TH:i:s', strtotime($data->start)) . '">';
            echo date('D, d M Y H:i:s', strtotime($data->start));
        }
        ?>
        <br/>
        <?php
        if (isset($data->end)) {
            echo CHtml::encode($data->getAttributeLabel('end'));
            ?>:
            <?php
            echo '<meta itemprop="endDate" content="' . date('Y-m-d\TH:i:s', strtotime($data->end)) . '">';
            echo date('D, d M Y H:i:s', strtotime($data->end));
        }
        ?>
    </div>

    <?php
    if (isset($data->venue)) {
        ?>
        <div class="event-list-venue right" itemprop="location">
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