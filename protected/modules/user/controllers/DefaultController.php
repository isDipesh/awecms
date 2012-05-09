<?php

class DefaultController extends Controller {

    /**
     * Lists all models.
     */
    private $_model;

    public function actionIndex() {

$this->redirect(array('/profile'));        
    }

}
