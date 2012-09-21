<?php

class AweUrlManager extends CUrlManager {

    public $appendParams = true;
    private $_rules = array();

    public function createUrl($route, $params = array(), $ampersand = '&') {

        //for admin and admin/*
        $parts = explode('/', $route);
        //do not mess with gii
        if ($parts[0] == 'gii')
            return parent::createUrl($route, $params, $ampersand);

//        ignore defaultController
        if (Yii::app()->hasModule($parts[0]) && isset($parts[1]) && $parts[1] == Yii::app()->getModule($parts[0])->defaultController) {
            unset($parts[1]);
            $route = implode('/', $parts);
        }

        if (substr(Yii::app()->getRequest()->pathInfo, 0, 6) == 'admin/' || Yii::app()->getRequest()->pathInfo == 'admin') {
            $route = 'admin/' . trim($route, '/');
        }

        $url = parent::createUrlDefault($route, $params, $ampersand);

        //handle slugs here
        if ($slug = Slug::getSlug(preg_replace('/' . trim(Yii::app()->baseUrl, '/') . '/', '', $url, 1))) {
            //if (Settings::get('SEO','externalSlug')
            $url = $slug;
            $url = Yii::app()->baseUrl . '/' . $url;
        }
        return $url;
    }

    protected function processRules() {
        if (empty($this->rules) || $this->getUrlFormat() === self::GET_FORMAT)
            return;
        if ($this->cacheID !== false && ($cache = Yii::app()->getComponent($this->cacheID)) !== null) {
            $hash = md5(serialize($this->rules));
            if (($data = $cache->get(self::CACHE_KEY)) !== false && isset($data[1]) && $data[1] === $hash) {
                $this->_rules = $data[0];
                return;
            }
        }
        foreach ($this->rules as $pattern => $route)
            $this->_rules[] = $this->createUrlRule($route, $pattern);
        if (isset($cache))
            $cache->set(self::CACHE_KEY, array($this->_rules, $hash));
    }

    public function parseUrl($request) {

        if ($this->getUrlFormat() === self::PATH_FORMAT) {
            $rawPathInfo = $request->getPathInfo();

            if ($p = Slug::getPath($rawPathInfo)) {
                $rawPathInfo = trim($p, '/');
                Yii::app()->punish = 0;
            }

            $pathInfo = $this->removeUrlSuffix($rawPathInfo, $this->urlSuffix);
            foreach ($this->_rules as $i => $rule) {
                if (is_array($rule))
                    $this->_rules[$i] = $rule = Yii::createComponent($rule);
                if (($r = $rule->parseUrl($this, $request, $pathInfo, $rawPathInfo)) !== false)
                    return isset($_GET[$this->routeVar]) ? $_GET[$this->routeVar] : $r;
            }
            if ($this->useStrictParsing)
                throw new CHttpException(404, Yii::t('yii', 'Unable to resolve the request "{route}".', array('{route}' => $pathInfo)));
            else
                return $pathInfo;
        }

        else if (isset($_GET[$this->routeVar]))
            return $_GET[$this->routeVar];
        else if (isset($_POST[$this->routeVar]))
            return $_POST[$this->routeVar];
        else
            return '';
    }

}