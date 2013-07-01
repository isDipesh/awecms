<div class="info">
    Welcome to the control panel for <?php echo Settings::get('site','name'); ?>.
    <br/>
    Use the links from the navigation menu above to administrate the web site.
</div>

<div class="boxes">

    <a href="<?php echo Yii::app()->baseUrl; ?>/">
        <span class="box">
            <span class="box-icon icon-awehome"></span>
            <span class="box-text">Home</span>
        </span>
    </a>

    <?php if (Yii::app()->hasModule('user')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/user">
        <span class="box">
            <span class="box-icon icon-aweusers"></span>
            <span class="box-text">Users</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('role')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/role">
        <span class="box">
            <span class="box-icon icon-aweeye-blocked"></span>
            <span class="box-text">Roles</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('page')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/page">
        <span class="box">
            <span class="box-icon icon-awecopy"></span>
            <span class="box-text">Pages</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('block')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/block">
        <span class="box">
            <span class="box-icon icon-awefile"></span>
            <span class="box-text">Block</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('category')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/category">
        <span class="box">
            <span class="box-icon icon-awecabinet"></span>
            <span class="box-text">Categories</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('news')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/news">
        <span class="box">
            <span class="box-icon icon-awenewspaper"></span>
            <span class="box-text">News</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('event')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/event">
        <span class="box">
            <span class="box-icon icon-awecalendar"></span>
            <span class="box-text">Events</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('SEO')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/SEO">
        <span class="box">
            <span class="box-icon icon-awezoom-in"></span>
            <span class="box-text">SEO</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('comments')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/comments">
        <span class="box">
            <span class="box-icon icon-awebubbles"></span>
            <span class="box-text">Comments</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('directory')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/directory">
        <span class="box">
            <span class="box-icon icon-aweaddress-book"></span>
            <span class="box-text">Directory</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('file')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/file">
        <span class="box">
            <span class="box-icon icon-awestorage"></span>
            <span class="box-text">Files</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('gallery')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/gallery">
        <span class="box">
            <span class="box-icon icon-aweimages"></span>
            <span class="box-text">Gallery</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('menu')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/menu">
        <span class="box">
            <span class="box-icon icon-awemenu"></span>
            <span class="box-text">Menu</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('search')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/search">
        <span class="box">
            <span class="box-icon icon-awesearch"></span>
            <span class="box-text">Search</span>
        </span>
    </a>
    <?php } ?>

    <?php if (Yii::app()->hasModule('tag')) {?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/tag">
        <span class="box">
            <span class="box-icon icon-awetags"></span>
            <span class="box-text">Tags</span>
        </span>
    </a>
    <?php } ?>

    <a href="<?php echo Yii::app()->baseUrl; ?>/admin/settings">
        <span class="box">
            <span class="box-icon icon-awecog"></span>
            <span class="box-text">Settings</span>
        </span>
    </a>


</div>


