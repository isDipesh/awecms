<?php

// adapted from http://www.yiiframework.com/wiki/20/how-to-generate-web-feed-for-an-application/

Yii::import('page.vendors.*');
require_once('Zend/Feed.php');
require_once('Zend/Feed/Rss.php');

class FeedController extends Controller {

    public $entries = array();

    public function actionIndex() {

        $feed_title = Awecms::getSiteName();
        $feed_description = Settings::get('site', 'tagline');

        //provide model name or array of models, implementing page behavior
        $pageModels = array('Page', 'News', Event::model()->findAll());
        //for models other than implementing Page behavior
        $otherModels = array(
            //format : array('modelName','titleField','contentField','linkFormat')
            //linkFormat is optional and you may wrap attributes to be evaluated with {} to get the attribute value in runtime
            array('Album', 'title', 'content', '/gallery/album/view/id/{id}'),
            array('Business', 'title', 'content', '/directory/business/view/id/{id}'),
            array('Image', 'title', 'description'),
        );

        foreach ($otherModels as $otherModel) {
            $link = isset($otherModel[3]) ? $otherModel[3] : NULL;
            $this->addToFeed($otherModel[0], $otherModel[1], $otherModel[2], $link);
        }

        foreach ($pageModels as $model) {
            $this->addToFeed($model, 'title', 'content');
        }

        // generate and render RSS feed
        $feed = Zend_Feed::importArray(array(
                    'title' => $feed_title,
                    'description' => $feed_description,
                    'link' => $this->createUrl(''),
                    'charset' => 'UTF-8',
                    'generator' => 'AweCMS',
                    'entries' => $this->entries,
                        ), 'rss');
        $feed->send();
    }

    public function addToFeed($model, $title, $content, $link = null) {
        //if model name is provided, get models
        if (gettype($model) == 'string') {
            $items = $model::model()->findAll();
        } else {
            $items = $model;
        }
        foreach ($items as $post) {
            $entry['title'] = $post->$title;
            $entry['description'] = ($post->$content) ? $post->$content : '';

            if ($link) {
                //key replacements
                $pattern = '/{(.+)}/e';
                $replace = "self::getAttr(\$post,'$1')";
                $l = preg_replace($pattern, $replace, $link);
                $l = Yii::app()->createAbsoluteUrl($l);
            } else {//guess the view url
                if (in_array('page-behavior', array_keys($post->behaviors())))
                    $l = $post->getUrl();
                else
                    $l = Yii::app()->createAbsoluteUrl('/' . strtolower(get_class($post)) . '/view', array('id' => $post->id));
                //  $l = '/' . strtolower(get_class($post)) . '/view/id/' . $post->id;
            }


            $entry['link'] = $l;
            $this->entries[] = $entry;
        }
    }

    public static function getAttr($model, $in) {
        return $model->$in;
    }

}