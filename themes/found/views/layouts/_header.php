<header itemscope itemtype="http://schema.org/WPHeader" class="row">
    <?php
    $logo = Settings::get('site', 'logo');
    if ($logo) {
        ?>
        <div class="site-logo large-3 small-4 column">
            <img alt="" src="<?php echo Settings::get('site', 'logo'); ?>">
        </div>
        <?php
    }
    ?>
    <div class="column large-<?php echo $logo?13:16; ?> small-12">
        <div class="row">
            <div class="column large-8 site-title small-16">
                <a href="<?php echo Yii::app()->baseUrl; ?>/">
                    <h1><?php echo Settings::get('site', 'name'); ?></h1>
                </a>
            </div>
            <div class="column large-8 hide-for-small login-widget">
                <?php $this->widget('LoginWidget'); ?>
            </div>
        </div>
        <div class="row">
            <div class="column large-8 small-10  site-slogan">
                <h6><?php echo Settings::get('site', 'slogan'); ?></h6>
            </div>
            <div class="column large-8 small-6 site-search">
                <?php $this->widget('SearchBlock'); ?>
            </div>
        </div>
    </div>

    <hr/>

    <nav id="main-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <?php $this->widget('MenuRenderer'); ?>
    </nav>

    <hr/>
</header>