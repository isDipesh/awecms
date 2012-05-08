<?php

//collection of helper methods
class Awecms {

    public static function getSiteName() {
        if (Settings::get('site', 'site_name'))
            return Settings::get('site', 'site_name');
        else
            return Yii::app()->name;
    }

    public static function array_to_object($array) {
        $obj = new stdClass;
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $obj->{$k} = Awecms::array_to_object($v); //RECURSION
            } else {
                $obj->{$k} = $v;
            }
        }
        return $obj;
    }

    //removes submit input from POST
    function removeSubmitFromPost($post) {
        unset($post['yt0']);
        unset($post['yt1']);
        unset($post['yt2']);
        return $post;
    }

    public static function generateFriendlyName($name) {
        return ucwords(trim(strtolower(str_replace(array('-', '_', '.'), ' ', preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $name)))));
    }

    public static function typeOf($var) {
        if (is_string($var)) {

            if (preg_match('/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/', $var))
                return 'email';

            //if url
            if (preg_match('/^https?:\/\/[a-z0-9-]+(\.[a-z0-9-]+)+/i', $var)) {
                //check for image url
                // Parse the url into individual components
                $url_parse = parse_url($var);
                // could be any kind of weird site like an ftp or something, restrict to http and https
                if (($url_parse['scheme'] == 'http') || ($url_parse['scheme'] == 'https')) {
                    // basename() strips off any preceding directories
                    $file = pathinfo(basename($url_parse["path"]));
                    if (isset($file['extension']) && in_array($file['extension'], array('jpg', 'png', 'gif', 'jpeg'))) {
                        return 'image_url';
                    }
                }
                return 'url';
            }
            return 'textfield';
        }
        return (gettype($var));
    }

}

?>
