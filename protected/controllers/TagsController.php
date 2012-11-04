<?php

class TagsController extends Controller {

    public function filters() {
        
    }

    public function actionJson() {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        $this->layout = false;
        if (isset($_GET['tag'])) {

            $criteria = new CDbCriteria(array(
                        'limit' => 10
                    ));

            $criteria->addSearchCondition('name', $_GET['tag']);

            $tags = Tag::model()->findAll($criteria);

            if ($tags) {
                $total = count($tags) - 1;
                foreach ($tags as $i => $tag) {
                    echo '{';
                    echo '"id": "' . $tag->tag . '",';
                    echo '"label": "' . $tag->tag . '",';
                    echo '"value": "' . $tag->slug . '"';
                    echo '}';
                    if ($total !== $i) {
                        echo ',';
                    }
                }
            }
        }
    }

}
