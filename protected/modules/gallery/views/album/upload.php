
<?php

$this->widget('xupload.XUpload', array(
    'url' => Yii::app()->createUrl("gallery/album/gulp"),
    'model' => $model,
    'attribute' => 'file',
    'multiple' => true,
    'htmlOptions' => array('name' => 'images'),
    'options' => array(
        'beforeSend' => "js:function(event, files, index, xhr, handler, callBack) {
                        console.log(files);
                                }",
        'completed' => 'js:function(event, files, index, xhr, handler, callBack) {
                        console.log("complete");

                    }',
    ),
        )
);
?>