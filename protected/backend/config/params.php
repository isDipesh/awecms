<?php

// this array inherits all values from protected/config/params.php array
$retval=array(
    'headerTitle'=>'Web3CMS Administrator Area', //'Web3CMS Administrator Area'
    'pathToFiles'=>dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR,
    'siteTitle'=>'Web3CMS Administrator', //'Web3CMS Administrator'
);
$myfile=dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'mycustom'.DIRECTORY_SEPARATOR.basename(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.basename(dirname(__FILE__)).DIRECTORY_SEPARATOR.basename(__FILE__);
return (file_exists($myfile) && is_array($myarray=require($myfile))) ? CMap::mergeArray($retval,$myarray) : $retval;