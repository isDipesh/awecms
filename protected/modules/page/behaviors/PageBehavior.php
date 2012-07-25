<?php

class PageBehavior extends CActiveRecordBehavior {

    public function beforeValidate($event) {

        $isPage = (get_class($this->owner) == 'Page') ? true : false;

        //save the model specific fields (properties not covered by Page)
        if (isset($_POST[get_class($this->owner)]))
            $this->owner->setAttributes($_POST[get_class($this->owner)]);

        if ($this->owner->scenario == 'insert')
            $page = new Page;
        else if ($isPage)
            $page = $this->owner;
        else
            $page = $this->owner->page;

        //get and save attributes of page
        if (isset($_POST['Page']))
            $page->setAttributes($_POST['Page']);

        //relations need to be handled separately
        if (isset($_POST['Page']['user']))
            $page->user = $_POST['Page']['user'];
        else
            $page->user = Yii::app()->user->id;
        if (isset($_POST['Page']['parent']))
            $page->parent = $_POST['Page']['parent'];
        if (isset($_POST['Page']['categories']))
            $page->categories = $_POST['Page']['categories'];

        //save the page, except when the owner is page itself
        if (!$isPage) {
            $page->save();
            //now relate the page to the model
            $this->owner->page = $page;
        }
    }

    public function afterSave($event) {
        if (get_class($this->owner) == 'Page')
            return;
        else
            $page = $this->owner->page;
        if (isset($_POST['Page']['slug'])) {
            if
            (($this->owner->scenario == 'insert' ||
                    ($this->owner->scenario == 'update'
                    && $page->slug
                    && $_POST['Page']['slug'] != $page->slug->slug))
            ) {
                //get the id of the page
                $page = Page::model()->findByPk($page->id);
                //save the slug
                $page->slug = Slug::create($_POST['Page']['slug'], array('view', 'id' => $page->id));
                $page->save();
            }
        }
    }

}