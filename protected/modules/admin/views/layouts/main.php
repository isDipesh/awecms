<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language ?>">
    <head>
        <meta charset=utf-8" />
        <title>Dashboard : <?php echo Yii::app()->name ?></title>
        <?php $assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.admin.assets')) . '/'; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $assetsUrl; ?>admin.css?<?php echo time() ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js?<?php echo time() ?>"></script>
        <style type="text/css">
        </style>
    </head>

    <body>

        <div id="main_container">
            <header id="top_header">
                <h2 id="title">
                    <?php echo CHtml::link(AdminModule::t('Dashboard') . ' : ' . Settings::get('site', 'name'), array('/')); ?>
                </h2>
                <nav id="header_right">
                    <ul id="header_links">
                        <li><?php echo AdminModule::t('Logged in as') . ' ' . Yii::app()->user->name; ?></li> |
                        <li><?php echo CHtml::link(AdminModule::t('Account Settings'), array('/user/profile/edit')); ?></li> |
                        <li><?php echo CHtml::link(AdminModule::t('Visit Website'), Yii::app()->baseUrl . '/'); ?></li> |
                        <li><?php echo CHtml::link(AdminModule::t('Logout'), array('/user/logout')); ?></li>
                    </ul>
                </nav>
                <nav id="admin_menu">
                    <?php
                    $this->widget(
                            'MenuRenderer', array('name' => 'admin', 'append' => array(
                            array(
                                'label' => 'Settings',
                                'items' => Settings::getCategoriesAsLinks(),
                            ),
                            array(
                                'label' => 'Modules',
                                'items' => AdminModule::getLinkForModules()
                            ),
                        )
                            )
                    );
                    ?>
                </nav>

            </header>
            <div class="clear"></div>
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'homeLink' => '<a href="' . Yii::app()->baseUrl . '/admin">Dashboard</a>'
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>
            <?php
            ?>
            <nav id="left_sidebar">
                <?php
//                $this->widget('zii.widgets.jui.CJuiAccordion', array(
//                    'panels' => AdminModule::getDashboardMenu(),
//                    'options' => array(
//                        'collapsible' => true,
//                        'active' => 0,
//                        'animated' => 'slide',
//                        'navigation' => true,
//                        'collapsible' => false,
//                    ),
//                    'htmlOptions' => array(
//                        'style' => 'width:220px;'
//                    ),
//                ));
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => Awecms::filterMenu($this->menu),
                    'htmlOptions' => array('class' => 'operations'),
                ));
                $this->endWidget();
                ?>


            </nav>

            <div id="main_wrapper">
                <?php
                echo $content;
                ?>

            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>