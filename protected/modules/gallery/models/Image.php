<?php

Yii::import('application.modules.gallery.models._base.BaseImage');

class Image extends BaseImage {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function behaviors() {
        return array(
            'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior'),
            'egalleria' => array(
                'class' => 'application.modules.gallery.extensions.galleria.EGalleriaBehavior',
                'image' => 'url', //This is a required binding and will be the src of image element
                'description' => 'description', //Optional
                'title' => 'title', //Optional
            )
        );
    }

    public function getUrl() {
        return Yii::app()->baseUrl . '/' . trim(Settings::get('gallery', 'uploadUrl'), '/') . '/' . $this->file;
    }

    public function getReadableSize($retstring = null) {
        // adapted from code at http://aidanlister.com/repos/v/function.size_readable.php
        $sizes = array('bytes', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

        if ($retstring === null) {
            $retstring = '%01.2f %s';
        }

        $lastsizestring = end($sizes);

        foreach ($sizes as $sizestring) {
            if ($this->size < 1024) {
                break;
            }
            if ($sizestring != $lastsizestring) {
                $this->size /= 1024;
            }
        }
        if ($sizestring == $sizes[0]) {
            $retstring = '%01d %s';
        } // Bytes aren't normally fractional
        return sprintf($retstring, $this->size, $sizestring);
    }

}