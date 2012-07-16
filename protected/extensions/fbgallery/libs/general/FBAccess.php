<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class FBAccess extends fbgallery
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	//here we add/remove users which will have access to cpanel
	private function users($type)
	{
		switch($type){
			case('editors'):
				return array('demo');
			break;
			case('admins'):
				return array('admin');
			break;
		}
	}

	//set level access for different users
	public function setLevelAccess()
	{
		//to be implemented according to system
		if(self::personalisedMode())
			self::personalisedMode();
		else
		{
			//admin
			if(!Yii::app()->user->isGuest && in_array(Yii::app()->user->name, self::users('admins')))
				$this->levelAccess = 2;
			//editor
			if(!Yii::app()->user->isGuest && in_array(Yii::app()->user->name, self::users('editors')))
				$this->levelAccess = 1;
			//visitor
			if(Yii::app()->user->isGuest)
				$this->levelAccess = 0;
			
			//check if editor is author of this album
			//if is restricted to edit any album, check if is the owner of actuall album, else treat him as a simple visitor
			if( $this->levelAccess===1 && (!$this->conf->editorOfOther || !$this->conf->editorOperateCollection))
			{
				//there is set an album or collection on this page
				if(isset($this->author))
				{
					if($this->album)
						if(!$this->conf->editorOfOther && $this->author !== Yii::app()->user->name)
							$this->levelAccess = 0;

					if($this->collection)
						if(!$this->conf->editorOperateCollection)
							$this->levelAccess = 0;
				}
				else // is a new gallery page, but isn't set any album or collection
				{
					//editor haven't any rights to create album or collection
					//will be treat as a visitor 
					if(!$this->conf->editorCreateAlbum && !$this->conf->editorOperateCollection)
							$this->levelAccess = 0;

				}
			}
		}
	}

	//to be implemented according to system
	//this is an example of personalised mode,
	//implemented in my cms
	private function personalisedMode()
	{
		//comment next line when you customize this function
		return false;

		//here will go visitors
		if(Yii::app()->user->isGuest)
			$this->levelAccess = 0;

		//here will go editors
		if(!Yii::app()->user->isGuest)
			$this->levelAccess = 1;

		//here will go admins
		if(!Yii::app()->user->isGuest && Yii::app()->user->getState('role') === 'admin')
			$this->levelAccess = 2;

		return true;
	}

}