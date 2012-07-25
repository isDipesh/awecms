<?php

class PageBehavior extends CActiveRecordBehavior {

    public function beforeValidate($event) {
        echo "beforeValidate on " . $this->owner->scenario . "<br/>";

        //save the model specific fields (properties not covered by Page)
        if (isset($_POST[get_class($this->owner)]))
            $this->owner->setAttributes($_POST[get_class($this->owner)]);

        if ($this->owner->scenario == 'insert')
            $page = new Page;
        else
            $page = $this->owner->page;

        //get and save attributes of page
        if (isset($_POST['Page']))
            $page->setAttributes($_POST['Page']);

        //relation need to be handled separately
        if (isset($_POST['Page']['user']))
            $page->user = $_POST['Page']['user'];
        else
            $page->user = Yii::app()->user->id;
        if (isset($_POST['Page']['parent']))
            $page->parent = $_POST['Page']['parent'];
        if (isset($_POST['Page']['categories']))
            $page->categories = $_POST['Page']['categories'];

        //save the page
        $page->save();

        //now relate the page to the model
        $this->owner->page = $page;

//        if (get_class($this->owner) == 'Page')
//            $model = $this->owner;
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