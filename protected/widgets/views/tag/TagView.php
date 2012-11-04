<?php
$tag_it = Yii::app()->getAssetManager()->publish(__DIR__ . '/tag-it.js');
$tag_it_css = Yii::app()->getAssetManager()->publish(__DIR__ . '/tag-it.css');
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery.ui');
$cs->registerCoreScript('jquery.autocomplete');
$cs->registerScriptFile($tag_it);
$cs->registerCssFile($tag_it_css);

$cs->registerScript($id, '
    $("#' . $id . '").tagit({
        tags: ' . $tags . ',
        tagSource: function(request, response) {
                $.ajax({
                    type: "POST",
                    url: "'.$url.'",
                    dataType: "json",
                    data: { tag: request.term, count: 10 },
                    success: function(data) {
                        response(data);
                    }
                });
            },
    });
', CClientScript::POS_READY);
?>

<label for="<?php echo CHtml::encode($id); ?>">Tags</label>
<ul id="<?php echo CHtml::encode($id); ?>">
    <li class="tagit-new">
        <input class="tagit-input" type="text" />
    </li>
</ul>