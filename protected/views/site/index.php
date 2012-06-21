<div class="row">
    <?php
    $this->widget('application.components.widgets.tag.TagWidget', array(
        'url' => Yii::app()->request->baseUrl . '/site/json/',
        'tags' => array('a','b','c')
    ));
    ?>
</div>