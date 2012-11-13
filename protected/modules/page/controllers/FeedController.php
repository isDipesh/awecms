<?php

//http://www.yiiframework.com/wiki/20/how-to-generate-web-feed-for-an-application/

Yii::import('page.vendors.*');
require_once('Zend/Feed.php');
require_once('Zend/Feed/Rss.php');

class FeedController extends Controller {

    public function actionIndex() {
        // retrieve the latest 20 posts
        $posts = Page::model()->findAll(array(
            'order' => 'created_at DESC',
            'limit' => 20,
                ));
        // convert to the format needed by Zend_Feed
        $entries = array();
        foreach ($posts as $post) {
            $description = ($post->content) ? $post->content : 'a';
            $entries[] = array(
                'title' => $post->title,
                'link' => $this->createUrl('page/view', array('id' => $post->id)),
                'description' => $description,
//                'lastUpdate' => $post->created_at,
            );
        }
        // generate and render RSS feed
        $feed = Zend_Feed::importArray(array(
                    'title' => 'My Post Feed',
                    'description' => 'My Feed Description',
                    'link' => $this->createUrl(''),
                    'charset' => 'UTF-8',
                    'entries' => $entries,
                        ), 'rss');
        $feed->send();
    }

}