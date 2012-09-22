<div class="clear"></div>

<div id="footer">
    Copyright &copy; <?php echo date('Y');
            ?> by My Company.<br/>
    All Rights Reserved.<br/>
    <?php echo Yii::powered(); ?>
    <?php echo 'Page generated in ' . round((microtime(TRUE) - $start_time), 4) . ' seconds using ' . round(memory_get_peak_usage(true) / 1048576, 2) . ' MB of memory!'; ?>
</div><!-- footer -->