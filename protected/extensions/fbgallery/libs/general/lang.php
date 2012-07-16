<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class lang
{
	public $default;
	public $active;
	public $all;

	public function __construct($conf)
	{
		$all = $conf->isMultilingual ? array_map('trim', explode(',', $conf->languages)) : array($conf->defaultLanguage);
		$this->default = $conf->defaultLanguage;
		$this->active = in_array(Yii::app()->language, $all) ? Yii::app()->language : $conf->defaultLanguage;
		$this->all = $all;
	}
}
?>