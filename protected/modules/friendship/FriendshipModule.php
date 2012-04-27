<?php
Yii::setPathOfAlias('FriendshipModule' , dirname(__FILE__));

class FriendshipModule extends CWebModule {

	public $controllerMap=array(
			'friendship'=>array(
				'class'=>'FriendshipModule.controllers.YumFriendshipController'),
			);

}
