<div class="view">

    <div class="date">
        <p>25 <span>May</span></p>
    </div>

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