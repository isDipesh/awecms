<?php

class AweAdminController extends Controller {

    public function actionIndex() {
        $this->layout = 'application.modules.admin.views.layouts.main';
        $this->render('/index');
    }
    
}