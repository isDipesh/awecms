<?php

Yii::import('application.vendors.*');
require_once('Zend/Search/Lucene.php');

class SearchController extends CController {

    private $_indexFile = 'protected/runtime/search';

    public function actionIndex() {
        echo 1;
    }

    public function actionCreate() {
        $index = new Zend_Search_Lucene($this->_indexFile, true);
        // Add documents to the database.
        $url = 'http://localhost';
        $doc = Zend_Search_Lucene_Document_Html::loadHTMLFile($url);
        $index->addDocument($doc);
        $index->commit();
        //$this->render('create');
    }

    public function actionSearch() {
    if (isset($_GET['terms'])) {
        $index = new Zend_Search_Lucene($this->_indexFile);
        $results = $index->find($_GET['terms']);
        print_r($results);
        //$this->render('search', array('results' => $results));
    } else {
        $this->render('index');
    }
}

    public function actionUpdate() {
        
    }

}