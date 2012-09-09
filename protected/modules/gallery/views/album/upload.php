
<?php

$this->widget('xupload.XUpload', array(
    'url' => Yii::app()->createUrl("gallery/album/gulp"),
    'model' => $model,
    'attribute' => 'file',
    'multiple' => true,
        )
);
?>