<?php
class AlbumController extends Controller {


    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Album');
        $this->render('index', array(
                'dataProvider' => $dataProvider,
        ));
    }
        
    public function actionView($id) {
        $this->render('view', array(
                'model' => $this->loadModel($id),
        ));
    }
        
    public function actionCreate() {
        $model = new Album;
                if (isset($_POST['Album'])) {
            $model->setAttributes($_POST['Album']);

			 if (isset($_POST['Album']['thumbnail'])) $model->thumbnail = $_POST['Album']['thumbnail'];
			 if (isset($_POST['Album']['page'])) $model->page = $_POST['Album']['page'];
                
                try {
                    if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                            $this->redirect($_GET['returnUrl']);
                    } else {
                            $this->redirect(array('view','id'=>$model->id));
                    }
                }
                } catch (Exception $e) {
                        $model->addError('', $e->getMessage());
                }
        } elseif(isset($_GET['Album'])) {
                        $model->attributes = $_GET['Album'];
        }

        $this->render('create',array( 'model'=>$model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        
        if(isset($_POST['Album'])) {
            $model->setAttributes($_POST['Album']);
if (isset($_POST['Album']['thumbnail'])) $model->thumbnail = $_POST['Album']['thumbnail'];
		else
		$model->thumbnail = array();
if (isset($_POST['Album']['page'])) $model->page = $_POST['Album']['page'];
		else
		$model->page = array();
                try {
                    if($model->save()) {
                        if (isset($_GET['returnUrl'])) {
                                $this->redirect($_GET['returnUrl']);
                        } else {
                                $this->redirect(array('view','id'=>$model->id));
                        }
                    }
                } catch (Exception $e) {
                        $model->addError('', $e->getMessage());
                }

            }

        $this->render('update',array(
                'model'=>$model,
                ));
    }
                
               

    public function actionDelete($id) {
        if(Yii::app()->request->isPostRequest) {    
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                    throw new CHttpException(500,$e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                            $this->redirect(array('admin'));
            }
        }
        else
            throw new CHttpException(400,
                Yii::t('app', 'Invalid request.'));
    }
                
    public function actionAdmin() {
        $model = new Album('search');
        $model->unsetAttributes();

        if (isset($_GET['Album']))
                $model->setAttributes($_GET['Album']);

        $this->render('admin', array(
                'model' => $model,
        ));
    }
    
    
    public function loadModel($id) {
            $model=Album::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
            return $model;
    }

}