<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css?<?php echo time() ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css?<?php echo time() ?>" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css?<?php echo time() ?>" />

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js?<?php echo time() ?>"></script>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Awecms::getSiteName()); ?></div>
                <?php $this->widget('LoginWidget'); ?>
            </div><!-- header -->

            <?php
            //TODO Beautify the login widget
            if (Yii::app()->user->isGuest)
            //$this->widget('application.modules.user.components.LoginWidget');
                
                ?>

            <div id="mainmenu">
                <?php $this->widget('MenuRenderer',array('id'=>1)); ?>

            </div><!-- mainmenu -->

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php
            date_default_timezone_set('GMT');
            echo date('Y');
            ?> by My Company.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
