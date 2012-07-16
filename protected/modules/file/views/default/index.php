<?php
$this->breadcrumbs = array(
    'Files',
);

?>

<div id="file-uploader"></div>

<?php

$filesPath = Yii::app()->basePath . "/../uploads";
$filesUrl = Yii::app()->baseUrl . "/uploads";

$this->widget("ext.ezzeelfinder.ElFinderWidget", array(
    'selector' => "div#file-uploader",
    'clientOptions' => array(
        'resizable' => false,
        'wysiwyg' => "ckeditor"
    ),
    'connectorRoute' => "file/fileUploaderConnector",
    'connectorOptions' => array(
        'roots' => array(
            array(
                'driver' => "LocalFileSystem",
                'path' => $filesPath,
                'URL' => $filesUrl,
                'tmbPath' => $filesPath . DIRECTORY_SEPARATOR . ".thumbs",
                'mimeDetect' => "internal",
                'accessControl' => "access"
            )
        )
    )
));


?>