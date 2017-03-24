<?php
namespace app\models;
use yii\base\Model;

/**
 * Class RegistrationForm
 * @package app\models
 */
class RegistrationForm extends Model{

    public $username;
    public $phone;
    public $pass1;
    public $pass2;

    public function attributeLabels(){

        return [

            'username' => 'email',
            'phone' => 'Phone number',
            'pass1' => 'Password',
            'pass2' => 'Password repeat'

        ];
    }

    public function rules(){

        return [
            [['username', 'phone', 'pass1', 'pass2'], 'required'],
            [['pass1', 'pass2'], 'validatePassword']
        ];
    }

    public function validatePassword($attribute, $params){
        //echo "<pre>";var_dump($this->pass1);die();
        if (!$this->hasErrors()){
            if($this->pass1 != $this->pass2){
                $this->addError($attribute, 'Passwords are not equel');
            }
        }
        /*if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }*/
    }

}