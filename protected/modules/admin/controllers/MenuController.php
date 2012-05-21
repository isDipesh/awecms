<?php
class MenuController extends Controller {

    public function actionCreate() {
        $model = new Menu;
                if (isset($_POST['Menu'])) {
            $model->setAttributes($_POST['Menu']);
                
                                
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
        } elseif(isset($_GET['Menu'])) {
                        $model->attributes = $_GET['Menu'];
        }

        $this->render('create',array( 'model'=>$model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        
        if(isset($_POST['Menu']))
        {
            $model->setAttributes($_POST['Menu']);

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
                Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
    }
                
    public function actionIndex() {
        $model = new Menu('search');
        $model->unsetAttributes();

        if (isset($_GET['Menu']))
                $model->setAttributes($_GET['Menu']);

        $this->render('index', array(
                'model' => $model,
        ));
    }

    public function loadModel($id) {
            $model=Menu::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
            return $model;
    }


    public function beforeAction($action) {
            if ($this->module !== null) {
                    $this->breadcrumbs[$this->module->Id] = array('/'.$this->module->Id);
            }
            return true;
    }
        
}//End of Controller Class
