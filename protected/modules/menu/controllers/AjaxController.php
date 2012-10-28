<?php

class AjaxController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionSave() {
        foreach ($_POST['list'] as $item) {
            print_r($_POST);
            if ($item['item_id'] == 'root')
                continue;
            if ($item['parent_id'] == "root") {
                $item['parent_id'] = "0";
            }
            $menuItem = MenuItem::model()->findByPk($item['item_id']);
            $menuItem->parent = $item['parent_id'];
            $menuItem->depth = $item['depth'];
            $menuItem->lft = $item['left'];
            $menuItem->rgt = $item['right'];
            $menuItem->save();
        }
    }

}

?>
