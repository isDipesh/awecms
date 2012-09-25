<?php

Yii::import('application.models._base.BaseSlug');

class Slug extends BaseSlug {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

//    public static function set($slug, $path, $enabled = true) {
//        $sl = new self;
//        $sl->slug = self::cleanText($slug);
//
//        $sl->path = $path;
//        $sl->enabled = $enabled;
//        $sl->save();
//    }

    public static function getPath($slug) {
        $slug = trim($slug, '/');
        $sl = new self;
        $slug = $sl->findByAttributes(array('slug' => $slug, 'enabled' => 1));
        if ($slug)
            return $slug->path;
        else
            return false;
    }

    public static function getSlug($path) {
        $path = trim($path, '/');
        $sl = new self;
        $slug = $sl->findByAttributes(array('path' => $path, 'enabled' => 1));
        if ($slug)
            return $slug->slug;
        else
            return false;
    }

    public static function disable($slug) {
        $sl = new self;
        $slug = $sl->findByAttributes(array('slug' => $slug));
        $slug->enabled = 0;
        $sl->save();
    }

    public static function enable($slug) {
        $sl = new self;
        $slug = $sl->findByAttributes(array('slug' => $slug));
        $slug->enabled = 1;
        $sl->save();
    }

    public static function create($slug, $path) {
        $slug = trim($slug, '/');

        if (is_array($path)) {
            $route = isset($path[0]) ? $path[0] : '';
            $path = Yii::app()->getController()->createUrl($route, array_splice($path, 1));
            //remove the baseURL that createURL adds
            $path = str_replace(Yii::app()->baseUrl, '', $path);
        }
        $path = trim($path, '/');
        $s = new self;
        $s->slug = $slug;

        if (substr($path, 0, 5) == 'admin') {
            $path = substr($path, 5);
        }
        $path = trim($path, '/');
        $s->path = $path;

        //handle duplicate slugs - slug, slug-1, slug-2 and so on
        $counter = 0;
        $newSlug = $slug;
        while (self::pathExists($newSlug)) {
            if (!$counter)
                $newSlug.='-' . ++$counter;
            else
                $newSlug = $slug . '-' . ++$counter;
        }
        $s->slug = self::cleanText($newSlug);
        $s->enabled = 1;
        $s->save();
        return $s->id;
    }

    public function change($slug) {
        //no actions required if the new slug is same as the old
        if ($slug == $this->slug)
            return;
        $counter = 0;
        $newSlug = $slug;
        while (self::pathExists($newSlug)) {
            if (!$counter)
                $newSlug.='-' . ++$counter;
            else
                $newSlug = $slug . '-' . ++$counter;
        }
        $this->slug = self::cleanText($newSlug);
        $this->save();
    }

    //check if path or the slug already exists
    public static function pathExists($s) {
        if (($controller = Yii::app()->createController($s)) || self::getPath($s))
            return true;
        return false;
    }

    public static function cleanText($text, $spaceReplacement = "-") {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        $clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
        $clean = strtolower(trim($clean));
        $clean = preg_replace("/[\/_| -]+/", $spaceReplacement, $clean);
        return $clean;
    }

    /*
     * Ensures the given slug is unique in the database
     * @param string $text The text to check
     * @return string The unique slug
     */

    public function checkUniqueSlug($text) {
        $sql = "SELECT COUNT(" . $this->owner->getMetaData()->tableSchema->primaryKey . ") FROM " . $this->owner->tableName() . " WHERE " . $this->slugAttribute . " = :slug";
        $cmd = yii::app()->db->createCommand($sql);
        $cmd->bindValue(":slug", $text);
        $result = $cmd->queryScalar();
        if ($result > 0) {
            $sql = "SELECT COUNT(" . $this->owner->getMetaData()->tableSchema->primaryKey . ") FROM " . $this->owner->tableName() . " WHERE " . $this->slugAttribute . " LIKE :slug";
            $cmd = yii::app()->db->createCommand($sql);
            $cmd->bindValue(":slug", $text . $this->spaceReplacement . "%");
            $result = $cmd->queryScalar() + 2;
            $text .= $this->spaceReplacement . $result;
        }
        return $text;
    }

}