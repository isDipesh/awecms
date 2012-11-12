<?php

class Disqus extends CWidget {

    public $id;
    public $model;

    public function init() {

        if (!$this->id)
            $this->id = Settings::get('site', 'disqus_id');
        if (!$this->id)
            return false;
        $this->renderContent();
    }

    public function renderContent() {
        ?>
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            var disqus_shortname = '<?php echo $this->id; ?>';
        <?php
        if ($this->model)
            $identifier = get_class($this->model) . '--' . $this->model->id;
        echo "var disqus_identifier = '{$identifier}';"
        ?>
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <?php
    }

}