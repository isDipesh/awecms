<?php

Yii::import('application.models._base.BaseSlug');

class Slug extends BaseSlug {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function set($slug, $path, $enabled = true) {
        $sl = new self;
        $sl->slug = self::cleanText($slug);
        $sl->path = $path;
        $sl->enabled = $enabled;
        $sl->save();
    }

    public static function getPath($slug) {
        $sl = new self;
        $slug = $sl->findByAttributes(array('slug' => $slug, 'enabled' => 1));
        if ($slug)
            return $slug->path;
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

    public static function cleanText($text, $spaceReplacement = "-") {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        $clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
        $clean = strtolower(trim($clean));
        $clean = preg_replace("/[\/_| -]+/", $spaceReplacement, $clean);
        return $clean;
    }

    //TODO make unique, add counter to end for repeated slug
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