<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language?>">
    <head>
        <meta charset=utf-8" />
        <title>Dashboard : <?php echo Yii::app()->name ?></title>
        <?php $assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.admin.assets')) . '/'; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $assetsUrl; ?>admin.css?<?php echo time() ?>"/>
        <script type="text/javascript">
            //accordion open/close toggle
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
            <header id="header">
                <h1>
                    <?php echo CHtml::link(UserModule::t('Dashboard') . ' : ' . Yii::app()->name, array('/profile/edit')); ?>
                </h1>
                <div id="header_right">
                    <ul id="header_links">
                        <li><?php echo UserModule::t('Welcome') . ' ' . Yii::app()->user->name; ?></li> |
                        <li><?php echo CHtml::link(UserModule::t('Account Settings'), array('/profile/edit')); ?></li> |
                        <li><?php echo CHtml::link(UserModule::t('Logout'), array('/logout')); ?></li> |
                    </ul>
                    <?php echo CHtml::link(UserModule::t('Visit Website'), array('/')); ?>
                </div>
                <nav>
                </nav>
                
            </header>

            <nav id="left_sidebar">

            </nav>


        </div>
        <footer>
            
        </footer>
    </body>
</html>