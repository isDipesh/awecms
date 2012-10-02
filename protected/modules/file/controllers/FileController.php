<?php

class FileController extends Controller {

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

    public function actionRedactorUpload() {

        $uploadPath = '/../uploads/';
        if (Settings::get('gallery', 'upload_path'))
            $uploadPath = '/' . trim(Settings::get('gallery', 'upload_path'), '/') . '/';

        $uploadUrl = '/uploads/';
        if (Settings::get('gallery', 'upload_url'))
            $uploadUrl = Settings::get('gallery', 'upload_url');

        $uploadPath = rtrim($uploadPath, '/') . '/editor/';

        $uploadPath = Yii::app()->basePath . $uploadPath;
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
            chmod($uploadPath, 0777);
            //throw new CHttpException(500, "{$this->path} does not exists.");
        } else if (!is_writable($uploadPath)) {
            chmod($uploadPath, 0777);
            //throw new CHttpException(500, "{$this->path} is not writable.");
        }

        $file = CUploadedFile::getInstanceByName('file');
        $fileName = time() . $file->getName();
        $file->saveAs($uploadPath . $fileName);
        $url = Yii::app()->baseUrl . $uploadUrl . 'editor/' . $fileName;

        $array = array(
            'filelink' => $url
        );
        echo stripslashes(json_encode($array));
    }

    public function actionListImages() {
        $uploadPath = Yii::app()->basePath . '/../uploads/';
        if (Settings::get('gallery', 'upload_path'))
            $uploadPath = '/' . trim(Settings::get('gallery', 'upload_path'), '/') . '/';
        $array = Awecms::rglob($uploadPath, '*.{jpg,png,gif}', GLOB_BRACE);
        echo stripslashes(json_encode($array));
    }

}