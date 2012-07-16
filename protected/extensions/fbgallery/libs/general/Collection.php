<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class Collection extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{collections}}';
	}

	public function rules()
	{
		return array(
			array('translations', 'required'),
			array('pid', 'numerical', 'integerOnly'=>true),
// 			array('id, pid, inf', 'safe', 'on'=>'search'),
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
			'url' => 'Url page for collection',
/*			'name' => 'Collection name',
			'description' => 'Collection description',*/
			'translations' => 'Collection translations',
			'albums' => 'Albums in collection',
		);
	}
}