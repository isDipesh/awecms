<?php

class PageBehavior extends CActiveRecordBehavior {

    public function getPath() {
        if (isset(Yii::app()->getController()->module))
            $module = Yii::app()->getController()->module->id;
        $controller = Yii::app()->getController()->id;
        $action = Yii::app()->getController()->getAction()->id;
        $path = $controller . '/' . $action;
        if (isset($module)) {
            $path = $module . '/' . $path;
        }
        return $path;
    }

    public function getP() {
        return (get_class($this->owner) == 'Page') ? $this->owner : $this->owner->page;
    }

    public function getHierarchyLinks() {
        $links = array();
        foreach ($this->getHierarchy() as $model) {
            if ($model === $this->owner)
                $links[] = $model->title;
            else
                $links[$model->title] = Yii::app()->createUrl($this->path, array('id' => $model->id));
        }
        return $links;
    }

    public function getHierarchy() {
        $model = $this->owner;
        $hierarchy = array();
        //we record pages parsed already so that we don't go through them again to lock ourselves inside infinite loop
        $parsed = array();
        do {
            if (in_array($model->id, $parsed))
                break;
            $parsed[] = $model->id;
            array_unshift($hierarchy, $model);
            $model = $model->parent;
        } while ($model);
        return $hierarchy;
    }

    public function beforeValidate($event) {
        $isPage = (get_class($this->owner) == 'Page') ? true : false;
        if ($isPage) {
            if ($this->owner->type != 'Page')
                return;
        }

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
                if ($_POST['Page']['slug'] == '') {
                    $page->slug->delete();
                    $page->slug = NULL;
                } else {
                    $page->slug->change($_POST['Page']['slug']);
                }
            }
        }

        //save the page, except when the owner is page itself
        if (!$isPage) {
            $page->type = get_class($this->owner);
            $page->save();
            //now relate the page to the model
            $this->owner->page = $page;
        }
    }

    public function afterSave($event) {
        //slug for pages are handled in PageController, to prevent infinite loop
        if (get_class($this->owner) == 'Page')
            return;
        $page = $this->owner->page;
        if (isset($_POST['Page']['slug']) && $_POST['Page']['slug'] != '') {
            if ($this->owner->scenario == 'insert' || ($this->owner->scenario == 'update' && (!isset($page->slug)))) {
                //get the page
                $page = Page::model()->findByPk($page->id);
                //save the slug
                $page->slug = Slug::create($_POST['Page']['slug'], array('view', 'id' => $this->owner->id));
                $page->save();
            }
        }
    }

//    public function afterFind($event) {
//        //afterFind gets called twice for classes other than Page
//        if (get_class($event->sender) != 'Page')
//            return;
//        $page = $this->p;
//        $params = Yii::app()->getController()->actionParams;
//        $class = get_class($this->owner);
//        if (Yii::app()->getController()->getAction()->id == 'view') {
//            //set page title
//            Yii::app()->getController()->pageTitle = $page->title . Awecms::getTitlePrefix();
//            //increase view count
//
//            $page->views++;
//            $page->save();
//        }
//    }

    public function afterDelete($event) {
        if (get_class($this->owner) == 'Page')
            return;
        $this->owner->page->delete();
    }

    public function getTitle() {
        if (get_class($this->owner) == 'Page')
            return $this->owner->title;
        if (isset($this->owner->page))
            return $this->owner->page->title;
    }

    public function getContent() {
        if (get_class($this->owner) == 'Page')
            return $this->owner->content;
        if (isset($this->owner->page))
            return $this->owner->page->content;
    }

    public function getDescription() {
        return $this->content;
    }

    public function getParent() {
        if (get_class($this->owner) == 'Page')
            return $this->owner->parent;
        $c = get_class($this->owner);
        return $c::model()->findByAttributes(array('page_id' => $this->owner->page->parent_id));
    }

    public function getParent_id() {
        if (get_class($this->owner) == 'Page')
            return $this->owner->parent_id;
        $c = get_class($this->owner);
        $parent = $c::model()->findByAttributes(array('page_id' => $this->owner->page->parent_id));
        if ($parent)
            return $parent->id;
    }

    public function getPageId() {
        if (get_class($this->owner) == 'Page')
            return $this->owner->id;
        if (isset($this->owner->page))
            return $this->owner->page->id;
    }

    public function getModified_at() {
        if (get_class($this->owner) == 'Page')
            return $this->owner->modified_at;
        if (isset($this->owner->page))
            return $this->owner->page->modified_at;
    }

    public function getCreated_at() {
        if (get_class($this->owner) == 'Page')
            return $this->owner->created_at;
        if (isset($this->owner->page))
            return $this->owner->page->created_at;
    }

}