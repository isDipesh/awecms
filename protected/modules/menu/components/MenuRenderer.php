<?php

Yii::import('zii.widgets.CMenu');

class MenuRenderer extends CMenu {

    public $id;
    public $name;
    public $firstItemCssClass = 'first';
    public $activeCssClass = 'active';
    public $lastItemCssClass = 'last';
    public $dirCssClass = 'dir';
    public $append = array();

    public function init() {

        if ($this->name) {
            $menu = Menu::model()->findByAttributes(array('name' => $this->name));
        } elseif ($this->id) {
            $menu = Menu::model()->findByPk($this->id);
        } elseif ($menu = Menu::model()->findByAttributes(array('name' => 'Main'))) {
            //NOP, assignment done within the codition above
        } else {//find the first one
            $menu = Menu::model()->find();
        }

        if (!$menu) {
            return false;
            //throw new CHttpException(404, 'The specified menu (id=' . $this->id . ') cannot be found.');
        }

        $class = array('dropdown', $menu->theme.'-theme');
        if ($menu->vertical) {
            $class[] = 'dropdown-vertical';
            if ($menu->rtl) {
                $class[] = 'dropdown-vertical-rtl';
                $cssFile = 'dropdown.vertical.rtl.css';
            } else {
                $cssFile = 'dropdown.vertical.css';
            }
        } else if ($menu->upward) {
            $class[] = 'dropdown-upward';
            $cssFile = 'dropdown.upward.css';
        } else {
            $class[] = 'dropdown-horizontal';
            $cssFile = 'dropdown.css';
        }

        $this->htmlOptions['class'] = implode(' ', $class);

        //print_r($menu->items);
        $items = $menu->items;

        $this->items = array_merge($items, $this->append);
//        $this->items = $menu->items;
        //print_r($this->items);

        $basedir = dirname(__FILE__) . '/../assets/frontend';
        $baseUrl = Yii::app()->getAssetManager()->publish($basedir);

        Yii::app()->getClientScript()->registerCSSFile($baseUrl . '/css/' . $cssFile)
                ->registerCSSFile($baseUrl . '/themes/' . $menu->theme . '/default.css');

        //ToDo: these should added just for IE7, i don't know how to do this
//            Yii::app()->getClientScript()->registerCoreScript('jquery')
//                                            ->registerScriptFile($baseUrl.'/js/jquery.dropdown.js');
        parent::init();
    }

    protected function renderMenuRecursive($items) {

        $count = 0;
        $n = count($items);
        foreach ($items as $item) {
            if ($item == array())
                continue;

            $visible = FALSE;
            //handle roles here
            if (isset($item['role'])) {
                $roles = explode(',', $item['role']);
                if (in_array('all', $roles)) {
                    $visible = TRUE;
                } else if (Yii::app()->user->isGuest && in_array('guest', $roles)) {
                    $visible = TRUE;
                } else if (Yii::app()->user->id && in_array('loggedIn', $roles)) {
                    $visible = TRUE;
                } else if (Yii::app()->hasModule('role')) {
                    foreach ($roles as $role) {
                        if (Role::is($role))
                            $visible = TRUE;
                    }
                }
            }
            else
                $visible = TRUE; //makes menu items visible if they have no roles index, e.g. with appended menu items



            if (!$visible)
                continue;

            $class = array();

            //handle links here
            if (isset($item['url'])) {
                //we use $link for finding if current menu item is active
                $link = $item['url'];
                if (Awecms::isUrl($item['url'])) {
                    //NOP
                } else if (substr($item['url'], 0, 2) == '//') {
                    //convert //foo to /foo
                    $item['url'] = substr($item['url'], 1);
                } else if ($item['url'] == '/') {
                    $item['url'] = Yii::app()->baseUrl ? Yii::app()->baseUrl : '/';
                } else {
                    $item['url'] = array($item['url']);
                }
            }

            if (isset($item['url'])) {
                $link = ltrim($link, '/');
                if ($link == Yii::app()->request->pathInfo)
                    $class[] = $this->activeCssClass;
            }

            $count++;
            $options = isset($item['itemOptions']) ? $item['itemOptions'] : array();

//            if ($item['active'] && $this->activeCssClass != '')
//                $class[] = $this->activeCssClass;
            if ($count === 1 && $this->firstItemCssClass != '')
                $class[] = $this->firstItemCssClass;
            if ($count === $n && $this->lastItemCssClass != '')
                $class[] = $this->lastItemCssClass;
            if ($class !== array()) {
                if (empty($options['class']))
                    $options['class'] = implode(' ', $class);
                else
                    $options['class'].=' ' . implode(' ', $class);
            }

            echo CHtml::openTag('li', $options);
            if (isset($item['items']) && count($item['items'])) {
                if (empty($options['class']))
                    $options['class'] = ' ' . $this->dirCssClass;
                else
                    $options['class'].=' ' . $this->dirCssClass;
            }

            //handle open-in-in-new-tab
            if (isset($item['target']))
                $options['target'] = $item['target'];

            //set description as title
            if (isset($item['description']))
                $options['title'] = $item['description'];

            $options['itemprop'] = 'url';

            $item['linkOptions'] = $options;
            $menu = $this->renderMenuItem($item);
            if (isset($this->itemTemplate) || isset($item['template'])) {
                $template = isset($item['template']) ? $item['template'] : $this->itemTemplate;
                echo strtr($template, array('{menu}' => $menu));
            }
            else
                echo $menu;

            if (isset($item['items']) && count($item['items'])) {
                echo "\n" . CHtml::openTag('ul', isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions) . "\n";
                $this->renderMenuRecursive($item['items']);
                echo CHtml::closeTag('ul') . "\n";
            }

            echo CHtml::closeTag('li') . "\n";
        }
    }

    protected function renderMenuItem($item) {
        if (isset($item['url'])) {
            $label = $this->linkLabelWrapper === null ? $item['label'] : '<' . $this->linkLabelWrapper . '>' . $item['label'] . '</' . $this->linkLabelWrapper . '>';
            $label = CHtml::tag('b', array('itemprop' => 'name'), $label);
            return CHtml::link($label, $item['url'], isset($item['linkOptions']) ? $item['linkOptions'] : array());
        }
        else
            return CHtml::tag('span', isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
    }

}

?>
