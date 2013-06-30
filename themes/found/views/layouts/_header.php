<header itemscope itemtype="http://schema.org/WPHeader">
    <div class="row">
        <?php
        $logo = Settings::get('site', 'logo');
        ?>

        <?php if ($logo) {
            ?>
            <div class="site-logo large-3 small-4 column">
                <img alt="" src="<?php echo Settings::get('site', 'logo'); ?>">
            </div>
            <?php
        }
        ?>


        <div class="column large-<?php echo $logo?13:16; ?> small-12">

            <div class="row">

                <div class="column large-8 site-title small-10">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/">
                        <h1><?php echo Settings::get('site', 'name'); ?></h1>
                    </a>
                </div>

                <div class="menu column large-8 small-6">
                    <nav class="main-nav right" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <?php $this->widget('MenuRenderer'); ?>
                    </nav>
                </div>

            </div>

            <div class="row">

                <div class="column large-8 small-10 site-slogan">
                    <h6><?php echo Settings::get('site', 'slogan'); ?></h6>
                </div>

                <div class="column large-8 small-6 bottom-right">

                </div>

            </div>

        </div>





    </div>




    <!-- <div class="row"> -->
    <!-- <nav class="main-nav" itemscope itemtype="http://schema.org/SiteNavigationElement"> -->
    <?php //$this->widget('MenuRenderer'); ?>
    <!-- </nav> -->
    <!-- </div> -->


    <div class="mid-bar row">
        <hr/>
        <div class="column large-9 small-10">
            <?php
            if (((Settings::get('site', 'enable_breadcrumbs') == '') || (Settings::get('site', 'enable_breadcrumbs') == 1)) && isset($this->breadcrumbs)) {
                $this->widget('Breadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    ));
            }
            ?>
        </div>
        <div class="column large-7 small-6 right">
            <?php $this->widget('SearchBlock'); ?>
        </div>
        <hr/>
    </div>


</header>