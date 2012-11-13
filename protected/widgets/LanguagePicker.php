<?php
/**
 * @see CPortlet
 */
Yii::import('zii.widgets.CPortlet');
 /**
  * This is a simple portlet to choose language from your messages directory
  * in controller::init() put 
  * @example
  * <pre>
  * Yii::import('ext.LanguagePicker.ELanguagePicker'); 
  * EThemePicker::setLanguage();
  * </pre>
  * @author David Constantine Kurushin http://www.zend.com/en/store/education/certification/authenticate.php/ClientCandidateID/ZEND015209/RegistrationID/238001337
  */
class ELanguagePicker extends CPortlet
{
	/**
	 * @var string a title for the widget
	 */
    public $title = 'Language Picker';
    /**
     * 
     * @var string the default tag name of the container
     */
    public $tagName = 'div';
    /**
     * @var array some html options for the dropdownlist
     */
 	public $dropDownOptions = array(
 		'submit'=>'',
 		'csrf'=>true, 
 		'class'=>'languageSelector' , 
 		'id'=>'languageSelector',
 	);
 	/**
 	 * (non-PHPdoc)
 	 * @see CPortlet::renderContent()
 	 */
    protected function renderContent()
    {
      $translations = self::getLanguagesList();
      echo CHtml::form('', 'post', array());
      echo CHtml::dropDownList('languageSelector' , Yii::app()->getLanguage(), $translations, $this->dropDownOptions);
      echo CHtml::endForm();
    }
    /**
     * set the language and save on cookie, or select from cookie
     * this should be called from  CController::init or CController::beforeAction etc.
     * @see CController::init() 
     * @see CController::beforeAction()
     * @param $cookieDays integer the amount of days the language choice will be saved, default 180 days
     */
    public static function setLanguage($cookieDays = 180){
    	if(Yii::app()->request->getPost('languageSelector') !== null && in_array($_POST['languageSelector'], self::getLanguagesList(), true)){
      		Yii::app()->setLanguage($_POST['languageSelector']);
      		$cookie = new CHttpCookie('language', $_POST['languageSelector']);
			$cookie->expire = time() + 60*60*24*$cookieDays; 
      		Yii::app()->request->cookies['language'] = $cookie;
    	}else if(isset(Yii::app()->request->cookies['language']) && in_array(Yii::app()->request->cookies['language']->value, self::getLanguagesList(), true) ){
    		Yii::app()->setLanguage(Yii::app()->request->cookies['language']->value);
    	}else if(isset(Yii::app()->request->cookies['language'])){
    		//if we came to this point, the language don't exists, so we better unset the cookie
    		unset(Yii::app()->request->cookies['language']);
    		throw new CHttpException(400, Yii::t('app', 'Invalid request. Translation don\'t exists!'));
    	}
    }
    /**
     * Iterates the messages directory and list the languages available
     * @return array list of languages
     */
    private static function getLanguagesList(){
    	$translations = array();
    	$directoryIterator = new DirectoryIterator(Yii::app()->messages->basePath);
    	foreach($directoryIterator as $item)
      	if($item->isDir() && !$item->isDot())
      		$translations[$item->getFilename()] = $item->getFilename(); 
      	return $translations;
    }
}