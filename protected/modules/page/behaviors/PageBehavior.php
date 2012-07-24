<?php

class PageBehavior extends CActiveRecordBehavior {

    public function beforeValidate($event) {
        echo "beforeValidate on " . $this->owner->scenario . "<br/>";
        //get the Page model
        if (get_class($this->owner) == 'Page')
            $model = $this->owner;
        else
            $model = $this->owner->page;
        
        

        //For create
        if ($this->owner->scenario == 'insert') {
            $model->setAttributes($_POST['Page']);
            if (isset($_POST['Page']['user']))
                $model->user = $_POST['Page']['user'];
            else
                $model->user = Yii::app()->user->id;
            if (isset($_POST['Page']['parent']))
                $model->parent = $_POST['Page']['parent'];

            if (isset($_POST['Page']['categories']))
                $model->categories = $_POST['Page']['categories'];
        }
        else if ($this->owner->scenario == 'update') {
            $model->setAttributes($_POST['Page']);
            if (isset($_POST['Page']['parent']))
                $model->parent = $_POST['Page']['parent'];
            else
                $model->parent = array();

            if (isset($_POST['Page']['user']))
                $model->user = $_POST['Page']['user'];

            if (isset($_POST['Page']['categories']))
                $model->categories = $_POST['Page']['categories'];
            else
                $model->categories = array();
        }

        //write back the page model
        if (get_class($this->owner) == 'Page')
            $this->owner->setAttributes($model->getAttributes());
        else
            $this->owner->page = $model;
    }

    public function beforeSave($event) {
        echo "beforeSave on " . $this->owner->scenario . "<br/>";
    }

    public function afterSave($event) {
        echo "afterSave on " . $this->owner->scenario . "<br/>";
        //get the id of the page
        if (get_class($this->owner) == 'Page')
            $id = $this->owner->id;
        else
            $id = $this->owner->page->id;
        if ($this->owner->scenario == 'insert' && isset($_POST['Page']['slug'])) {
            $page = Page::model()->findByPk($id);
            //save the slug
            $page->slug = Slug::create($_POST['Page']['slug'], array('view', 'id' => $id));
            $page->save();
        }
    }

    public function afterFind($event) {
        echo "afterFind on " . $this->owner->scenario . "<br/>";
    }

}