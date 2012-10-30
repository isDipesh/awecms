<?php

Yii::import('application.modules.directory.models._base.BaseBusinessCategory');

class BusinessCategory extends BaseBusinessCategory {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getAllBusinesses() {
        $dataProvider = new CActiveDataProvider('BusinessCategory');
        $tree = $this->getTree();
        //all children w/o duplicates
        $allChildren = array_map("unserialize", array_unique(array_map("serialize", Awecms::getAllChildren($tree))));
        $businesses = array();
        foreach ($allChildren as $cat) {
            if ($cat && $cat->businesses)
                $businesses[] = $cat->businesses;
        }
        return $businesses;
    }

    public function getCount() {
        return count($this->allBusinesses);
    }

    public function getTree() {
        $allCategories = BusinessCategory::model()->findAll();
        $whole = Awecms::buildTree(Awecms::quickSort(($allCategories)));

        $part = self::getNode($whole, $this->id);
//        print_r($part);
//        die();
        return array($part);
    }

    public static function getNode($tree, $id) {
//        print_r($tree);
//        die();
//        print_r($tree);
//        die();
        if (is_array($tree)) {
            foreach ($tree as $item) {
                $result = self::getNode($item, $id);
                if ($result)
                    return $result;
            }
        }elseif ($tree->id == $id) {
            return $tree;
        } elseif (isset($tree->children)) {
            $result = self::getNode($tree->children, $id);
            if ($result)
                return $result;
        }
        return false;
    }

}