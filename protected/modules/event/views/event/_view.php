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
            'fields' => array('title')
        ));
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

        <br/>
        <br/>
        <?php
        if (isset($data->venue)) {
            echo CHtml::encode($data->getAttributeLabel('venue'));
            ?>:
            <?php
            echo nl2br($data->venue);
        }
        ?>

        <br/>
        <br/>
        <br/>
        <?php
        if (isset($data->page->content)) {
            echo Yii::t('event', 'Description');
            ?>:
            <?php
            echo nl2br($data->page->content);
        }
        ?>

    </div>
</div>