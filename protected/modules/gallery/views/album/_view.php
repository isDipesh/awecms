<div class="view">
    <h2><?php echo CHtml::link(CHtml::encode($data->page->title), array('view', 'id' => $data->id)); ?></h2>
    <?php
    if (!empty($data->page->title)) {
        ?>
        <div class="field">

            <div class="field_value">
                <?php
                echo nl2br($data->page->content);
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>