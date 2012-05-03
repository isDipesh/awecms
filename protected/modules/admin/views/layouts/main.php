<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language ?>">
    <head>
        <meta charset=utf-8" />
        <title>Dashboard : <?php echo Yii::app()->name ?></title>
        <?php $assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.admin.assets')) . '/'; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $assetsUrl; ?>admin.css?<?php echo time() ?>"/>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                $('.accordion .head').click(function() {
                    $(this).next().toggle('slow');
                    return false;
                }).next().hide();
            });
        </script>
    </head>

    <body>

        <div id="main_container">
            <header>
                <h1>
                    <?php echo CHtml::link(AdminModule::t('Dashboard') . ' : ' . Yii::app()->name, array('/')); ?>
                </h1>
                <nav id="header_right">
                    <ul id="header_links">
                        <li><?php echo AdminModule::t('Welcome') . ' ' . Yii::app()->user->name; ?></li> |
                        <li><?php echo CHtml::link(AdminModule::t('Account Settings'), array('/profile/edit')); ?></li> |
                        <li><?php echo CHtml::link(AdminModule::t('Logout'), array('/user/logout')); ?></li> |
                    </ul>
                    <?php echo CHtml::link(AdminModule::t('Visit Website'), array('/')); ?>
                </nav>
                <nav>
                    <div class="grid_5 sidebar" style="overflow: auto">
                        <?php
//                        $this->widget('application.widgets.NavBar', array(
//                            'tryDefault' => FALSE,
//                            'context' => 'admin',
//                            'items' => array(
//                                array('label' => 'Admin Home', 'url' => array('/admin/index/index')),
//                            ),
//                        ));
                        ?>
                    </div>

                </nav>

            </header>
            <?php
            //print_r(Admin::getModules());

            $specialModules = array('admin', 'user', 'gii');
            $adminModule = Yii::app()->getModule('admin');




            $menuConfig['Users']['List Users'] = "/admin/user/";
            $menuConfig['Users']['Add User'] = "/admin/user/create/";
            $menuConfig['Users']['View Profile Fields'] = "/admin/profileField/";
            $menuConfig['Users']['Add Profile Field'] = "/admin/profileField/create/";
            $menuConfig['Settings']['Site'] = "/admin/settings";
            $menuConfig['Gii']['Create CRUD'] = "http://gii/crud/";


            foreach (Yii::app()->getModules() as $key => $value) {
                //echo $key;
                //print_r($value);
            }



            ?>
            <nav id="left_sidebar">
                <?php
                foreach ($menuConfig as $menuName => $menuHeads) {
                    echo '<div class="accordion"><div class="head">' . $menuName . ':</div><div class="accordion_items">';
                    foreach ($menuHeads as $menu => $link) {
                        echo CHtml::link(AdminModule::t($menu), array($link));
                        echo '<br/>';
                    }
                    echo '</div></div>';
                }
                ?>


            </nav>

            <?php
            echo $content;
            ?>



        </div>
        <footer>

        </footer>
    </body>
</html>