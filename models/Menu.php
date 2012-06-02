<?php

Yii::import('application.modules.menu.models._base.BaseMenu');

class Menu extends BaseMenu {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getThemes() {
        $themeDirs = array_map('basename', glob(Yii::getPathOfAlias('menu.assets.frontend.themes') . '/*', GLOB_ONLYDIR));
        $return = array();
        foreach ($themeDirs as $item) {
            $return[$item] = Awecms::generateFriendlyName($item);
        }
        return $return;
    }

    public function nestify($arrs) {
        $depth_key = 'depth';
        $nested = array();
        $depths = array();

        foreach ($arrs as $key => $arr) {
            if ($arr[$depth_key] == 0) {
                $nested[$key] = $arr;
                $depths[$arr[$depth_key] + 1] = $key;
            } else {
                $parent = & $nested;
                for ($i = 1; $i <= ( $arr[$depth_key] ); $i++) {
                    $parent = & $parent[$depths[$i]];
                }

                $parent[$key] = $arr;
                $depths[$arr[$depth_key] + 1] = $key;
            }
        }

        return $nested;
    }

    public function getItems() {
        $tree = array();
        $ref = array();
        $items = MenuItem::model()->findAllByAttributes(array('menu_id' => $this->id), array('order' => 'lft'));
        foreach ($items as $item) {
            $menuItem = array();
            $menuItem['label'] = $item->name;
            $menuItem['url'] = $item->link;
            if (!$item->parent_id) {
                $tree[$item->id] = $menuItem;
                $ref[$item->id] = &$tree[$item->id];
            } else {
                $ref[$item->parent_id]['items'][$item->id] = $menuItem;
                $ref[$item->id] = &$ref[$item->parent_id]['items'][$item->id];
            }
        }
        return $tree;
    }

}