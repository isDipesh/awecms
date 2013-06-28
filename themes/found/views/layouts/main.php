<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/foundation.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/base.css">

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>
</head>

<body itemscope itemtype="http://schema.org/<?php echo $this->webpageType; ?>">

    <header itemscope itemtype="http://schema.org/WPHeader" class="row">
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

    <div class="row crumb">
        <?php //TODO: show up some message and breadcrumb like Home /Index when user is not signed in and is in home page  ?>
        <?php
        if (((Settings::get('site', 'enable_breadcrumbs') == '') || (Settings::get('site', 'enable_breadcrumbs') == 1)) && isset($this->breadcrumbs)) {
            $this->widget('Breadcrumbs', array(
                'links' => $this->breadcrumbs,
                ));
        }
        ?>
    </div>

    <div class="row main">

        <div itemscope itemtype="http://schema.org/WPSideBar">
           <?php $this->widget('MenuRenderer', array('id'=>3)); ?>
           <?php $this->widget('Events'); ?>
       </div>

       <div itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
        <?php echo $content; ?>
    </div>

</div>

<?php include_once '_footer.php'; ?>
<?php $this->widget('GAnalytics'); ?>

</body>
</html>