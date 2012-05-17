<?php

Yii::import('application.modules.page.models._base.BasePage');

class Page extends BasePage {
    
    public $statuses = array('published','trashed','draft','closed');
    public $permissions = array('all','Superuser','author','password_protected');
    public $types = array('post');
    public $comment_statuses = array('open','closed');
            
            

    public static function model($className = __CLASS__) {
        
        return parent::model($className);
    }

    public function relations() {
        return array(
            'user' => array(self::HAS_ONE, 'User', 'id'),
        );
    }

}