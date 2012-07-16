<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class Album extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{albums}}';
	}

	public function rules()
	{
		return array(
			array('translations, author', 'required'),
			array('pid', 'numerical', 'integerOnly'=>true),
			array('author', 'length', 'max'=>128),
			array('tags', 'length', 'max'=>256),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array();
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pid'=>'Page id',
			'url' => 'Url page for album',
			'translations' => 'Album translations',
			'imgsOrder' => 'Images Order',
			'imgsInfo' => 'Images Information',
			'cover'=>'Album cover filename',
			'author'=>'Author',
			'tags'=>'Tags',
		);
	}
}