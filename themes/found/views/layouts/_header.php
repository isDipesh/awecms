<header itemscope itemtype="http://schema.org/WPHeader" class="row">
    <?php
    $logo = Settings::get('site', 'logo');
    if ($logo) {
        ?>
        <div class="site-logo small-3 column">
            <img alt="" src="<?php echo Settings::get('site', 'logo'); ?>">
        </div>
        <?php
    }
    ?>
    <div class="column small-<?php echo $logo?13:16; ?>">
        <div class="row">
            <div class="column small-8 site-title">
                <a href="<?php echo Yii::app()->baseUrl; ?>/">
                    <h1><?php echo Settings::get('site', 'name'); ?></h1>
                </a>
            </div>
            <div class="column small-8">
                <div class="right"><?php $this->widget('LoginWidget'); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="column small-8 site-slogan">
                <h6>Slogan Goes Here</h6>
            </div>
            <div class="column small-8">
                <div class="right"><?php $this->widget('SearchBlock'); ?></div>
            </div>
        </div>
    </div>

<hr/>

    <nav id="main-nav" itemscope itemtype="http://schema.org/SiteNavigationElement" class="row">
        <?php $this->widget('MenuRenderer'); ?>
    </nav>

<hr/>
</header>