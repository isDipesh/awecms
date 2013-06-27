<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="<?php echo Yii::app()->language ?>" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body itemscope itemtype="http://schema.org/<?php echo $this->webpageType; ?>">
    <div class="wrapper">
        <header itemtype="http://schema.org/WPHeader">
            <a href="<?php echo Yii::app()->baseUrl; ?>/">
                <h1 class="head"><?php echo Settings::get('site', 'name'); ?></h1>
            </a>
            <?php $this->widget('SearchBlock'); ?>
            <?php $this->widget('LoginWidget'); ?>
            <?php // $this->widget('LanguagePicker'); ?>
            <nav id="nav" itemscope itemtype="http://schema.org/SiteNavigationElement" >
                <?php $this->widget('MenuRenderer'); ?>
            </nav>
        </header>

        <div class="mid-bar row">
            <?php //TODO: show up some message and breadcrumb like Home /Index when user is not signed in and is in home page  ?>
            <?php
            if (((Settings::get('site', 'enable_breadcrumbs') == '') || (Settings::get('site', 'enable_breadcrumbs') == 1)) && isset($this->breadcrumbs)) {
                $this->widget('Breadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    ));
            }
            ?>
        </div>

        <div class="row">
            <div class="fifth" itemtype="http://schema.org/WPSideBar">
               <?php $this->widget('MenuRenderer', array('id'=>3)); ?>
               <?php $this->widget('Events'); ?>
           </div>

           <div class="fourfifth" itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
            <?php echo $content; ?>
        </div>
    </div>
    <?php include_once '_footer.php'; ?>
</div>
<?php $this->widget('GAnalytics'); ?>
</body>
</html>