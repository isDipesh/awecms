<?php

class Share extends AwePortlet {

    public $title;
    public $shareTo = array('Twitter', 'Facebook', 'Google+', 'Delicious', 'LinkedIn', 'Reddit', 'Tumblr', 'Digg', 'AddToAny');
    public $text;
    public $url;
    public $via;
    public $openInNewTab = true;
    public $model;
    public $networks;

    public function init() {

        if (!$this->title)
            $this->title = Yii::t('app', 'Share this page:');

        if ($this->model) {
            $this->text = $this->model->title;
            $this->url = $this->model->url;
        }

        if (!$this->text)
            $this->text = Yii::app()->getController()->pageTitle;

        if (!$this->url) {
            $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $this->url = $protocol . $_SERVER['HTTP_HOST'] . Yii::app()->request->requestUri;
        }

        $this->networks = array(
            'Twitter' => array(
                'format' => 'https://twitter.com/intent/tweet?text={{{text}}}&url={{{url}}}',
                'tip' => Yii::t('app', 'Tweet this!'),
                'icon' => 'twitter.ico'
            ),
            'Facebook' => array(
                'format' => 'http://www.facebook.com/sharer.php?u={{{url}}}&t={{{text}}}',
                'tip' => Yii::t('app', 'Share on Facebook!'),
                'icon' => 'facebook.png'
            ),
            'Google+' => array(
                'format' => 'https://plus.google.com/share?url={{{url}}}&gpsrc=frameless',
                'tip' => Yii::t('app', 'Share on Google+!'),
                'icon' => 'http://www.google.com/images/icons/product/gplus-16.png'
            ),
            'Delicious' => array(
                'format' => 'http://delicious.com/save?title={{{text}}}&url={{{url}}}',
                'tip' => Yii::t('app', 'Bookmark this on Delicious!'),
                'icon' => 'delicious.png'
            ),
            'LinkedIn' => array(
                'format' => 'http://www.linkedin.com/shareArticle?mini=true&url={{{url}}}&title={{{text}}}&summary=&source=',
                'tip' => Yii::t('app', 'Share this on LinkedIn!'),
                'icon' => 'linkedin.png'
            ),
            'Reddit' => array(
                'format' => 'http://www.reddit.com/submit?url={{{url}}}&title={{{text}}}',
                'tip' => Yii::t('app', 'Reddit this!'),
                'icon' => 'reddit.png'
            ),
            'Tumblr' => array(
                'format' => 'http://www.tumblr.com/share?v=3&u={{{url}}}&t={{{text}}}',
                'tip' => Yii::t('app', 'Share on Tumblr!'),
                'icon' => 'tumblr.png'
            ),
            'Digg' => array(
                'format' => 'http://digg.com/submit?url={{{url}}}&title={{{text}}}',
                'tip' => Yii::t('app', 'Digg this!'),
                'icon' => 'digg.png'
            ),
            'AddToAny' => array(
                'format' => 'http://www.addtoany.com/share_save#url={{{url}}}&title={{{text}}}&description=',
                'tip' => Yii::t('app', 'Share on other networks!'),
                'icon' => 'share.png'
            ),
        );

        if ($this->via)
            $this->networks['Twitter']['format'] = 'https://twitter.com/intent/tweet?via={{{via}}}&text={{{text}}}&url={{{url}}}';

        parent::init();
    }

    public function run() {
        $iconsDir = Yii::app()->assetManager->publish(
                __DIR__ . DIRECTORY_SEPARATOR . 'icons', false, -1, YII_DEBUG
        );
        $rep = array(
            'url' => $this->url,
            'text' => $this->text,
            'via' => $this->via,
        );
        foreach ($this->networks as $name => $network) {
            if (!in_array(strtolower($name), array_map('strtolower', $this->shareTo)))
                continue;
            $url = str_replace(array_map('self::maskit', array_keys($rep)), array_values($rep), $network['format']);
            if (Awecms::isUrl($network['icon']))
                $icon = $network['icon'];
            else
                $icon = $iconsDir . '/' . $network['icon'];

            $str = '<a href="' . $url . '"';
            if ($this->openInNewTab)
                $str.=' target="_blank"';
            $str.='title="' . $network['tip'] . '"><img src="' . $icon . '" alt="' . $name . '"></a>';
            echo $str;
        }
        parent::run();
    }

    public static function maskit($val) {
        return '{{{' . $val . '}}}';
    }

}

?>
