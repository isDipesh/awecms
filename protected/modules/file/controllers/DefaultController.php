<?php

class DefaultController extends Controller {

    public function actions() {
        return array(
            'fileUploaderConnector' => "ext.elfinder.ElFinderConnectorAction",
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionUploader() {
        $this->layout = false;
        $this->render('index');
    }

    public function actionCKUpload() {
        $callback = $_GET['CKEditorFuncNum'];
        $file = CUploadedFile::getInstanceByName('upload');
        $file->saveAs(Yii::app()->basePath . '/../uploads/editor/' . $file->getName());
        $url = Yii::app()->baseUrl . '/uploads/editor/' . $file->getName();
        $msg = '';
        $output = '<html><body><script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' . $callback . ', "' . $url . '","' . $msg . '");</script></body></html>';
        echo $output;
    }

}