


<?php
//print_r(Admin::getModules());

$specialModules = array('admin', 'user', 'gii');
$adminModule = Yii::app()->getModule('admin');


$menuConfig['Users']['Manage Users'] = "http://users/manage/";
$menuConfig['Users']['Delete Users'] = "http://users/delete/";
$menuConfig['Gii']['Create Model'] = "http://gii/model/";
$menuConfig['Gii']['Create CRUD'] = "http://gii/crud/";


foreach (Yii::app()->getModules() as $key => $value) {
    //echo $key;
    //print_r($value);
}

foreach ($menuConfig as $menuName => $menuHeads) {
    echo $menuName . '<br/>';
    foreach ($menuHeads as $menu => $link) {
        echo $menu."<br/>";
    }
}

//print_r($adminModule->getModules());
?>
<nav id="left_sidebar">

</nav>