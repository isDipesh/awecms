<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function filters() {
        return array(
            array(
                'COutputCache',
                'duration' => 43200,
            ),
        );
    }

    public function actionSitemapxml() {
        
        echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        $rules = array(
            //model, priority, url, changefrequency
            array(Page::findByType(), 1),
            array('News', 0.9),
            array('Event', 0.9),
            array('Category', 0.8),
            array('Business', 0.9, '/directory/business/view/id/{id}', 'monthly'),
            array('BusinessCategory', 0.8),
            array('Album', 0.9, '/gallery/album/view/id/{id}'),
            array('Image', 0.9),
            array('Tag', 0.8, '{link}'),
//            array('User', 0.5, '/user/profile/view/id/{id}'),
        );

        foreach ($rules as $rule) {
            $model = $rule[0];
            $link = isset($rule[2]) ? $rule[2] : NULL;
            //if model name is provided, get models
            if (gettype($model) == 'string') {
                $items = $model::model()->findAll();
            } else {
                $items = $model;
            }
            if (isset($items[0])) {
                foreach ($items as $item) {
                    echo "\t<url>" . PHP_EOL;
                    if (get_class($item) == 'Page' && $item->type != 'Page')
                        continue;
                    if ($link) {
                        //key replacements
                        $pattern = '/{(.+)}/e';
                        $replace = "self::getAttr(\$item,'$1')";
                        $l = preg_replace($pattern, $replace, $link);
                        $l = Yii::app()->createAbsoluteUrl($l);
                    } else {//guess the view url
                        if (in_array('page-behavior', array_keys($item->behaviors())))
                            $l = $item->getUrl();
                        else
                            $l = Yii::app()->createAbsoluteUrl('/' . strtolower(get_class($item)) . '/view', array('id' => $item->id));
                        //  $l = '/' . strtolower(get_class($item)) . '/view/id/' . $item->id;
                    }
                    echo "\t\t<loc>" . $l . '</loc>' . PHP_EOL;
                    if (isset($item->modified_at) && $item->modified_at)
                        echo "\t\t<lastmod>" . date('Y-m-d', strtotime($item->modified_at)) . '</lastmod>' . PHP_EOL;
                    if (isset($rule[3]))
                        echo "\t\t<changefreq>" . $rule[3] . '</changefreq>' . PHP_EOL;
                    if (isset($rule[1]))
                        echo "\t\t<priority>" . $rule[1] . '</priority>' . PHP_EOL;
                    echo "\t</url>" . PHP_EOL;
                }
            }
        }
        echo '</urlset>';
    }

    public static function getAttr($model, $in) {
        return $model->$in;
    }

}