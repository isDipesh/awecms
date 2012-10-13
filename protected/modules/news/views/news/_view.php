<div class="view">

    <?php
    $this->widget('PageItem', array(
        'data' => $data,
        'fields' => array('title', 'created_at', 'excerpt')
    ));
    ?>

</div>