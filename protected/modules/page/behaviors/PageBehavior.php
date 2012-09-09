<?php

class PageBehavior extends CActiveRecordBehavior {

    public function beforeValidate($event) {

        $isPage = (get_class($this->owner) == 'Page') ? true : false;

        $attributes = array();

        if (isset($_FILES[get_class($this->owner)])) {
            $attribute_arr = array_keys($_FILES[get_class($this->owner)]['name']);
            $attribute = $attribute_arr[0];
            //if the attribute already exists, don't override it, else retrieve the file instance and write
            $attributes[$attribute] =
                    (isset($this->owner->$attribute)) ?
                    $this->owner->$attribute : CUploadedFile::getInstance($this->owner, $attribute);
        }

        //save the model specific fields (properties not covered by Page)
        if (isset($_POST[get_class($this->owner)]))
            $this->owner->setAttributes($_POST[get_class($this->owner)]);

        foreach (array_keys($attributes) as $attribute) {
            $this->owner->$attribute = $attributes[$attribute];
        }

        if ($this->owner->scenario == 'insert')
            $page = new Page;
        else if ($isPage)
            $page = $this->owner;
        else
            $page = Page::model()->findByPk($this->owner->page_id);


        //get and save attributes of page
        if (isset($_POST['Page']))
            $page->setAttributes($_POST['Page']);
        elseif (isset($this->owner->name)) {
            $page->title = $this->owner->name;
        }

        //relations need to be handled separately
        if (isset($_POST['Page']['user']))
            $page->user = $_POST['Page']['user'];
        else
            $page->user = Yii::app()->user->id;
        if (isset($_POST['Page']['parent']))
            $page->parent = $_POST['Page']['parent'];
        if (isset($_POST['Page']['categories']))
            $page->categories = $_POST['Page']['categories'];

        //for update, we don't have to wait for it to be saved
        if ($this->owner->scenario == 'update' && isset($_POST['Page']['slug'])) {
            if (isset($page->slug->slug) && $_POST['Page']['slug'] != $page->slug->slug) {
                $page->slug->slug = $_POST['Page']['slug'];
                $page->slug->save();
            }
        }

//        save the page, except when the owner is page itself
        if (!$isPage) {
            $page->type = get_class($this->owner);
            $page->save();
            //now relate the page to the model
            $this->owner->page = $page;
        }
    }

    public function afterSave($event) {
        //slug for pages are handled in PageController
        if (get_class($this->owner) == 'Page')
            return;
        $page = $this->owner->page;
        if (isset($_POST['Page']['slug'])) {
            if ($this->owner->scenario == 'insert') {
                //get the page
                $page = Page::model()->findByPk($page->id);
                //save the slug
                $page->slug = Slug::create($_POST['Page']['slug'], array('view', 'id' => $this->owner->id));
                $page->save();
            }
        }
    }

    public function afterFind($event) {
        //afterFind gets called twice for classes other than Page
        if (get_class($event->sender) != 'Page')
            return;
        if (get_class($this->owner) == 'Page')
            $page = $this->owner;
        else
            $page = $this->owner->page;
        if (Yii::app()->getController()->getAction()->id == 'view') {
            //set page title
            Yii::app()->getController()->pageTitle = $page->title . ' - ' . Awecms::getSiteName();
            //increase view count
            $page->views++;
            $page->save();
        }
    }

    public function afterDelete($event) {
        if (get_class($this->owner) == 'Page')
            return;
        $this->owner->page->delete();
    }

}