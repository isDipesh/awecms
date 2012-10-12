<?php
$this->breadcrumbs = array(
    'Files',
);
?>

<div id="file-uploader"></div>

<?php
$filesPath = Yii::app()->basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "uploads";
$filesUrl = Yii::app()->baseUrl . DIRECTORY_SEPARATOR . "uploads";

$this->widget("ext.elfinder.ElFinderWidget", array(
    'selector' => "div#file-uploader",
    'clientOptions' => array(
        'resizable' => false,
        'wysiwyg' => "redactor"
    ),
    'connectorRoute' => "file/fileUploaderConnector",
    'connectorOptions' => array(
        'roots' => array(
            array(
                'driver' => "LocalFileSystem",
                'path' => $filesPath,
                'URL' => $filesUrl,
                'tmbPath' => $filesPath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . ".thumbs",
                'mimeDetect' => "internal",
                'accessControl' => "access"
            )
        )
    )
));
?>