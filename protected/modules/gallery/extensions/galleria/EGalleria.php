<?php
/**
 * EGalleria
 * =========
 * Yii framework extension to support galleria javascript plugin.
 * Links:
 * - Galleria: http://galleria.aino.se/
 * - EGalleria: http://www.github.com/dmtrs/egalleria
 * - Extension site: http://www.yiiframework.com/extension/egalleria
 * 
 * @version 0.2 beta
 * @author Dimitrios Mengidis <tydeas@gmail.com>
 * @date 11 Marc 2011
 **/
class EGalleria extends CWidget
{
    /**
     * Options for galleria plugin by user
     * For details: http://galleria.aino.se/docs/1.2/options/
     *
     * @var array
     **/
    public $galleria = null;

    /**
     * Dataprovider passed by user.
     * 
     * @array CDataProvider
     **/
    public $dataProvider = null; 
     
    /**
     * Available galleria options.
     * Loaded form EGalleria/galleria.options.php
     *
     * @var array
     **/
    private $avOptions = array();
    /**
     * Binding between model passed in dataProvider
     * This can be defined with behaviors() or in 
     * the initialization of this widget.
     * 
     * @var array
     **/
    public $binding = null;
    /**
     * The options to initialize the galleria plugin
     * This property will take value in initGalleria() 
     * function.
     * 
     * @var array
     **/
    private $galleriaOptions = null;

    public $srcPrefix = "";
    private $cssFiles = array('galleria.classic.css');
    private $jsFiles = array('galleria.js', 'galleria.classic.js');
    
    private $themePath = "theme";
    private $jsPath = "js";

    private $css;
    private $js;

    private $themeName = "classic";
    private $jsAssetPath = "";
    /**
     * Register all the js and css
     * needed for the galleria plugin and the
     * on ready script to start the plugin.
     *
     **/
    private function registerScripts()
    {
        $cs = Yii::app()->clientScript;

        if($this->css===null) {
            $cssFolder = dirname(__FILE__).DIRECTORY_SEPARATOR.$this->themePath.DIRECTORY_SEPARATOR;
            $cssFolder .= $this->themeName.DIRECTORY_SEPARATOR;

            $cssAssetPath = Yii::app()->getAssetManager()->publish($cssFolder);
            foreach($this->cssFiles as $file)
            {
                $cs->registerCssFile($cssAssetPath.DIRECTORY_SEPARATOR.$file);
            }
        }
        if($this->js===null) {
            $jsPath = dirname(__FILE__).DIRECTORY_SEPARATOR.$this->jsPath.DIRECTORY_SEPARATOR;

            if(!$cs->isScriptRegistered('jquery')) {
                $cs->registerCoreScript('jquery');
            }
            $this->jsAssetPath = Yii::app()->getAssetManager()->publish($jsPath);
            foreach($this->jsFiles as $file)
            {
                $cs->registerScriptFile($this->jsAssetPath.DIRECTORY_SEPARATOR.$file, CClientScript::POS_HEAD);
            }
        }
        $galleriaScript = "var jsn = eval(".CJSON::encode($this->galleriaOptions)."); $('#egalleria_".$this->id."').galleria(jsn);";
        $cs->registerScript("egalleria_script_".$this->id, $galleriaScript, CClientScript::POS_READY);
    }
    public function init()
    {   
        $this->avOptions = require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."galleria.options.php");
        $this->initGalleria();

        $this->registerScripts();

        echo "<div id='egalleria_".$this->id."' >";       
        parent::init();
    }
    public function run()
    { 
        $dataProvided = $this->dataCheck();
        if($dataProvided) {
            $this->render("egalleria", 
                array('bind'=>$this->binding, 
                'data'=>$this->dataProvider,
                'prefix'=>$this->srcPrefix,
            ));
        }
        echo "</div>";
    }
    /**
     * Check if data is provided to the widget.
     * If data are provided it checks for the binding as well.
     * If data is set and not binding then it returns false.
     * In other cases returns false;
     * 
     * @return boolean
     **/
    public function dataCheck()
    {     
        if(isset($this->dataProvider)) {
            if(isset($this->binding) && isset($this->binding["image"]))
                return true;
            $behavior = $this->dataProvider->model->behaviors();
            if(!empty($behavior)) {
                foreach($behavior as $name => $bind)
                {
                    if(strtolower($name) == "egalleria")
                        $this->binding = $bind;
                }         
                if(isset($this->binding) && isset($this->binding["image"]))
                    return true;
            }
        } else {
            return false;
        }
    }
    /**
     * Take the user input for "galleria" option
     * an initialize this galleriaOptions to use 
     * for the plugin options.
     * 
     **/
    private function initGalleria()
    {
        
        $initialize = array();
        if(is_array($this->galleria)) {
            foreach($this->galleria as $option => $value ){
                if(in_array($option, $this->avOptions))
                    $initialize[$option] = $value;
            }
        }
        foreach(array("width", "height") as $dim)
        {
            if(!isset($initialize[$dim]))
                $initialize[$dim] = 500;
            else if ((is_string($initialize[$dim])) && ($initialize[$dim] != "auto" )) {
                $position = strpos($initialize[$dim], "px");
                if( $position > 0 ) {
                    $value = (int)substr($initialize[$dim], 0 , $position);
                }
                if( $value == 0 )
                    $value = 500;
                $initialize[$dim] = $value;    
            }
        }
        $this->galleriaOptions = $initialize;
    }
}
