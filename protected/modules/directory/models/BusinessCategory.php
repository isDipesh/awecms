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
            if ($cat->businesses)
                $businesses[] = $cat->businesses;
        }
        return $businesses;
    }

    public function getCount() {
        return count($this->allBusinesses);
    }

    public function getTree() {
        $dataProvider = new CActiveDataProvider('BusinessCategory');
        $whole = Awecms::buildTree(Awecms::quickSort(($dataProvider->data)));
        $part = self::getNode($whole, $this->id);
        return array($part);
    }

    public static function getNode($tree, $id) {
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
    }

}