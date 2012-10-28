<?php

/**
 * Comment controller class file.
 *
 * @author Dmitry Zasjadko <segoddnja@gmail.com>
 * @link https://github.com/segoddnja/ECommentable
 * @version 1.0
 * @package Comments module
 * 
 */
class CommentController extends Controller {

    public $defaultAction = 'manage';

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'ajaxOnly + PostComment, Delete, Approve',
        );
    }
    
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xAAAAAA,
            ),
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('postComment', 'captcha'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('manage', 'delete', 'approve', 'update', 'disapprove'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Deletes a particular comment.
     * @param integer $id the ID of the comment to be deleted
     */
    public function actionDelete($id) {
        // we only allow deletion via POST request
        $result = array('deletedID' => $id);
        if ($this->loadModel($id)->setDeleted())
            $result['code'] = 'success';
        else
            $result['code'] = 'fail';
        echo CJSON::encode($result);
    }

    /**
     * Approves a particular model.
     * @param integer $id the ID of the model to be approve
     */
    public function actionApprove($id) {
        $result = array('approvedID' => $id);
        if ($this->loadModel($id)->setApproved())
            $result['code'] = 'success';
        else
            $result['code'] = 'fail';
        echo CJSON::encode($result);
    }

    /**
     * Disapproves a particular model.
     * @param integer $id the ID of the model to be approve
     */
    public function actionDisapprove($id) {
        $result = array('approvedID' => $id);
        if ($this->loadModel($id)->setDisapproved())
            $result['code'] = 'success';
        else
            $result['code'] = 'fail';
        echo CJSON::encode($result);
    }

    /**
     * Manages all models.
     */
    public function actionManage() {
        $model = new Comment('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['status']))
            $model->status = $_GET['status'];
        $this->render('manage', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (isset($_POST['Comment'])) {
            $model->setAttributes($_POST['Comment']);
            if ($_POST['Comment']['creator_id'] == 0)
                $model->creator_id = "NULL";
            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('/comments'));
                    }
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionPostComment() {
        if (isset($_POST['Comment']) && Yii::app()->request->isAjaxRequest) {
            $comment = new Comment();
            $comment->setAttributes($_POST['Comment']);
            $comment->count = $comment->getCommentCount($_POST['Comment']['owner_name'], $_POST['Comment']['owner_id']);
            $result = array();
            if ($comment->save()) {
                //if the comment status is approved or if premoderation is false, send success message
                if ($comment->status === 1 || !$comment->config['premoderate'])
                    $result['message'] = 'Your comment was successfully posted!';
                else //send success + wait message
                    $result['message'] = 'Your comment was successfully posted and will be visible only after it is moderated!';
                $result['code'] = 'success';
                $this->beginClip("list");
                $this->widget('comments.widgets.Comments', array(
                    'model' => $comment->ownerModel,
                    'showPopupForm' => false,
                ));
                $this->endClip();
                $this->beginClip('form');
                $this->widget('comments.widgets.ECommentsFormWidget', array(
                    'model' => $comment->ownerModel,
                ));
                $this->endClip();
                $result['list'] = $this->clips['list'];
            } else {
                $result['code'] = 'fail';
                $result['message'] = 'Your comment could not be posted because of errors!';
                $this->beginClip('form');
                $this->widget('comments.widgets.ECommentsFormWidget', array(
                    'model' => $comment->ownerModel,
                    'validatedComment' => $comment,
                ));
                $this->endClip();
            }
            $result['form'] = $this->clips['form'];
            echo CJSON::encode($result);
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Comment::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
