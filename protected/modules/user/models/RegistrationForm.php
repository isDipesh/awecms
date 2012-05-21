<?php
/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user registration form data. It is used by the 'registration' action of 'UserController'.
 */
class RegistrationForm extends User {
	public $verifyPassword;
	public $verifyCode;
	
	public function rules() {
		$rules = array(
			array('username, password, verifyPassword, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => Yii::t('app', "Incorrect username (length between 3 and 20 characters).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => Yii::t('app', "Minimal password length is 4 characters")),
			array('email', 'email'),
			array('username', 'unique', 'message' => Yii::t('app', "This username already exists.")),
			array('email', 'unique', 'message' => Yii::t('app', "This email address already exists.")),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => Yii::t('app', "Passwords don't match!")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => Yii::t('app', "Username can't have symbols")),
		);
		if (isset($_POST['ajax']) && $_POST['ajax']==='registration-form') 
			return $rules;
		else 
			array_push($rules,array('verifyCode', 'captcha', 'allowEmpty'=>!UserModule::doCaptcha('registration')));
		return $rules;
	}
	
}