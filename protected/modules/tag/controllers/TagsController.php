<?php

class TagsController extends Controller {

    public function filters() {
        
    }

    public function actionJson() {
        header('Content-type: application/json');
        $this->layout = false;
        if (isset($_POST['tag'])) {
            $criteria = new CDbCriteria(array(
                        'limit' => 10
                    ));
            $criteria->addSearchCondition('name', $_POST['tag']);
            $tags = Tag::model()->findAll($criteria);
            echo json_encode(array_map(create_function('$o', 'return $o->name;'), $tags));
        }
    }

    public function missingAction($actionID) {
        echo '<h1>' . Yii::t('app', 'Contents with tag') . ' "' . $actionID . '":</h1>';
    }

}
