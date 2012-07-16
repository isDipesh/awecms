<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class GalleryConfig extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{galleryConfig}}';
	}

	public function rules()
	{
		return array(
			array('type, config', 'required'),
			array('type', 'length', 'max'=>16),
		);
	}

	public function attributeLabels()
	{
		return array(
			'type' => 'Type',
			'config' => 'Config',
		);
	}
}