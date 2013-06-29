<?php

/**
 * http://www.yiiframework.com/extension/ac-breadcrumbs-microdata/
 */
class Breadcrumbs extends CWidget {

    /**
     * @var string the tag name for the breadcrumbs container tag. Defaults to 'div'.
     */
    public $tagName = 'div';

    /**
     * @var array the HTML attributes for the breadcrumbs container tag.
     */
    public $htmlOptions = array('class' => 'breadcrumbs');

    /**
     * @var boolean whether to HTML encode the link labels. Defaults to true.
     */
    public $encodeLabel = true;

    /**
     * @var string the first hyperlink in the breadcrumbs (called home link).
     * If this property is not set, it defaults to a link pointing to {@link CWebApplication::homeUrl} with label 'Home'.
     * If this property is false, the home link will not be rendered.
     */
    public $homeLink;

    /**
     * @var array list of hyperlinks to appear in the breadcrumbs. If this property is empty,
     * the widget will not render anything. Each key-value pair in the array
     * will be used to generate a hyperlink by calling CHtml::link(key, value). For this reason, the key
     * refers to the label of the link while the value can be a string or an array (used to
     * create a URL). For more details, please refer to {@link CHtml::link}.
     * If an element's key is an integer, it means the element will be rendered as a label only (meaning the current page).
     *
     * The following example will generate breadcrumbs as "Home > Sample post > Edit", where "Home" points to the homepage,
     * "Sample post" points to the "index.php?r=post/view&id=12" page, and "Edit" is a label. Note that the "Home" link
     * is specified via {@link homeLink} separately.
     *
     * <pre>
     * array(
     *     'Sample post'=>array('post/view', 'id'=>12),
     *     'Edit',
     * )
     * </pre>
     */
    public $links = array();

    /**
     * @var string the separator between links in the breadcrumbs. Defaults to ' &raquo; '.
     */
    public $separator = '<span class="breadcrumb-separator"> &raquo; </span>';

    /**
     * Renders the content of the portlet.
     */
    public function run() {
        if (empty($this->links))
            return;

        $this->htmlOptions['itemprop'] = 'breadcrumb';
        $this->htmlOptions['itemscope'] = '';
        $this->htmlOptions['itemtype'] = 'http://data-vocabulary.org/Breadcrumb';
        $htmlOptionsLinks = array('itemprop' => 'url');

        echo CHtml::openTag($this->tagName, $this->htmlOptions) . "\n";
        $links = array();
        if ($this->homeLink === null)
            $links[] = CHtml::link('<span itemprop="title">' . Yii::t('app', 'Home') . '</span>', Yii::app()->homeUrl, $htmlOptionsLinks);
        else if ($this->homeLink !== false)
            $links[] = $this->homeLink;
        foreach ($this->links as $label => $url) {
            if (is_string($label) || is_array($url))
                $links[] = CHtml::link($this->encodeLabel ? '<span itemprop="title">' . CHtml::encode($label) . '</span>' : '<span itemprop="title">' . $label . '</span>', $url, $htmlOptionsLinks);
            else
                $links[] = '<span itemprop="title">' . ($this->encodeLabel ? CHtml::encode($url) : $url) . '</span>';
        }
        echo implode($this->separator, $links);
        echo CHtml::closeTag($this->tagName);
    }

}