<?php

Yii::import('search.vendors.*');
require_once('Zend/Search/Lucene.php');

class SearchController extends CController {

    private $_indexFile = 'protected/runtime/search';
    public $breadcrumbs;

    public function actionIndex() {
        if (isset($_GET['q'])) {
            $queryString = $_GET['q'];
            $index = new Zend_Search_Lucene($this->_indexFile);
            $results = $index->find($queryString);
            //print_r($results);
            $query = Zend_Search_Lucene_Search_QueryParser::parse($queryString);
            $this->render('index', compact('results', 'queryString', 'query'));
        } else {
            //$this->render('index');
            echo 1;
        }
    }

    public function actionCreate() {
        echo "Search index creation started...<br/>";
        echo "Creating indices on {$this->_indexFile}...<br/>";


        $index = new Zend_Search_Lucene($this->_indexFile, true);

        $items = MenuItem::model()->findAllByAttributes(array('menu_id' => '1'));
        foreach ($items as $item) {
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($item->name), 'utf-8'));
            $doc->addField(Zend_Search_Lucene_Field::Text('link', CHtml::encode($item->link), 'utf-8'));
            $doc->addField(Zend_Search_Lucene_Field::Text('content', CHtml::encode($item->role), 'utf-8'));
            $index->addDocument($doc);
        }

        $index->commit();
        //$this->render('create');
        //print_r($index->getCount());

        self::printInfoFromIndex($index);
    }

    public static function printInfoFromIndex($index) {
        
        echo "<p>Index Generation ID: " . $index->getGeneration() . '</p>';

        echo "<p>Total indexed items: " . $index->maxDoc() . '</p>';

        echo "<p>Field Names:<br/>";
        print_r($index->getFieldNames());
        echo "</p>";

        $a = $index->hasDeletions() ? '' : 'no ';
        echo "<p>Index has " . $a . 'deletions!</p>';

        




        print_r($index->terms());
    }

    public function actionUpdate() {
        // Open existing index
        $index = Zend_Search_Lucene::open('/data/my-index');

        $doc = new Zend_Search_Lucene_Document();
        // Store document URL to identify it in search result.
        $doc->addField(Zend_Search_Lucene_Field::Text('url', $docUrl));
        // Index document content
        $doc->addField(Zend_Search_Lucene_Field::UnStored('contents', $docContent));

        // Add document to the index.
        $index->addDocument($doc);
    }

}