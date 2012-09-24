<?php

Yii::import('application.modules.directory.models._base.BaseBusinessCategory');

class BusinessCategory extends BaseBusinessCategory {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getTree() {
        $dataProvider = new CActiveDataProvider('BusinessCategory');
//        $items = array(
//            (object) array('id' => 1, 'title' => 'Software', 'parent_id' => 0),
//            (object) array('id' => 9, 'title' => 'Hardware', 'parent_id' => 0),
//            (object) array('id' => 10, 'title' => 'Linux', 'parent_id' => 1),
//            (object) array('id' => 7, 'title' => 'TV', 'parent_id' => 9),
//            (object) array('id' => 13, 'title' => 'PC', 'parent_id' => 9),
//            (object) array('id' => 12, 'title' => 'Android', 'parent_id' => 1),
//            (object) array('id' => 11, 'title' => 'JellyBean', 'parent_id' => 12),
//            (object) array('id' => 110, 'title' => 'ICS', 'parent_id' => 12),
//        );
        $whole = Awecms::buildTree(Awecms::quickSort(($dataProvider->data)));
//        $whole = Awecms::buildTree(Awecms::quickSort(($items)));
        $part = self::getNode($whole, $this->id);
//        print_r($part);
        return array($part);
    }

    public static function getNode($tree, $id) {
//        print_r(gettype($tree));
        if (is_array($tree)) {
//            print_r($tree);
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