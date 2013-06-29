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

    <?php include_once '_header.php'; ?>

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

        <div itemscope itemtype="http://schema.org/WPSideBar" class="column large-3 hide-for-medium-down">
           <?php //$this->widget('MenuRenderer', array('id'=>3)); ?>
           <?php $this->widget('Events'); ?>
       </div>

       <div itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement" class="column large-13">
        <?php echo $content; ?>
    </div>

</div>

<?php include_once '_footer.php'; ?>
<?php $this->widget('GAnalytics'); ?>

</body>
</html>