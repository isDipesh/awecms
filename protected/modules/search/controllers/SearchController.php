<?php

Yii::import('search.vendors.*');
require_once('Zend/Search/Lucene.php');

class SearchController extends Controller {

    private $_indexFile = 'protected/runtime/search';
    public $breadcrumbs;
    public $index;

    public function actionCreate() {


        $otherModels = array(
            array('Album', 'title', 'content', '/gallery/album/view/id/{id}'),
            array('Image', 'title', 'description'),
        );
        //provide model name or array of models, implementing page behavior
        $pageModels = array('Page', 'News', Event::model()->findAll());

        echo "Search index creation started.<br/>";
        echo "Creating indices on {$this->_indexFile}<br/><br/>";
        $this->index = new Zend_Search_Lucene($this->_indexFile, true);

        foreach ($otherModels as $otherModel) {
            $link = isset($otherModel[3]) ? $otherModel[3] : NULL;
            $this->addIndex($otherModel[0], $otherModel[1], $otherModel[2], $link);
        }
        echo '<br/>';

        echo "Creating indices for models with Page behavior...<br/>";
        foreach ($pageModels as $model) {
            $this->addIndex($model, 'title', 'content');
        }

        self::printInfoFromIndex($this->index);
    }

    public function actionIndex() {
        if (isset($_GET['q'])) {
            $queryString = $_GET['q'];
            $index = new Zend_Search_Lucene($this->_indexFile);
            $results = $index->find($queryString);
            $query = Zend_Search_Lucene_Search_QueryParser::parse($queryString);
            $this->render('index', compact('results', 'queryString', 'query'));
        } else {
            $this->render('advanced');
        }
    }

    private function addIndex($model, $title, $content, $link = NULL) {
        $items = array();
        //if model name is provided, get models
        if (gettype($model) == 'string') {
            $items = $model::model()->findAll();
        } else {
            $items = $model;
        }
        if (isset($items[0]))
            echo "Creating indices for " . get_class($items[0]) . " model<br/>";
//            print_r(get_class($items[0]));
        foreach ($items as $item) {
            if (get_class($item) == 'Page' && $item->type != 'Page')
                continue;
            if ($link) {
                //key replacements
                $pattern = '/{(.+)}/e';
                $replace = "self::getAttr(\$item,'$1')";
                $l = preg_replace($pattern, $replace, $link);
            } else {//guess the view url
                $l = '/' . strtolower(get_class($item)) . '/view/id/' . $item->id;
//                $l = Yii::app()->createUrl('/'.strtolower(get_class($item)).'/view',array('id'=>$item->id));
            }
            //real shit happens here
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($item->$title), 'utf-8'));
            $doc->addField(Zend_Search_Lucene_Field::Text('link', CHtml::encode($l), 'utf-8'));
            $doc->addField(Zend_Search_Lucene_Field::Text('content', $item->$content, 'utf-8'));
            $this->index->addDocument($doc);
        }

        $this->index->commit();
    }

    public static function printInfoFromIndex($index) {

        echo "<br/>Index generation complete.<br/>";
        echo "Index Generation ID: " . $index->getGeneration() . '<br/>';
        echo "Total indexed items: " . $index->maxDoc() . '<br/>';

        $a = $index->hasDeletions() ? '' : 'no ';
        echo "Index has {$a}deletions!<br/>";

//        echo "<p>Field Names:<br/>";
//        echo implode(',', $index->getFieldNames());
//        echo "</p>";

        $terms = $index->terms();
        echo "First Field: {$terms[0]->field} => {$terms[0]->text}<br/>";
        $n = count($terms) - 1;
        echo "Last Field: {$terms[$n]->field} => {$terms[$n]->text}";
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

    public static function getAttr($model, $in) {
        return $model->$in;
    }

}