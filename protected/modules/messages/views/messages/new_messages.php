<?php 
$messages = YumMessage::model()->findAll(
		'to_user_id = :to and message_read = 0',
		array( ':to' => Yii::app()->user->id)
		);

if(count($messages) > 0) {
	if(Yum::module('messages')->messageSystem == YumMessage::MSG_PLAIN) 
		$this->renderPartial(
				'application.modules.messages.views.messages.new_messages_plain', array(
					'messages' => $messages));
	else if(Yum::module('messages')->messageSystem == YumMessage::MSG_DIALOG)
		$this->renderPartial(
				'application.modules.messages.views.messages.new_messages_dialog', array(
					'messages' => $messages));
}
?>
