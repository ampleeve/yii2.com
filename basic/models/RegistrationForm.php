<?php
namespace app\models;
use yii\base\Model;
use Yii;

/**
 * Class RegistrationForm
 * @package app\models
 */
class RegistrationForm extends Model{

    public $username;
    public $phone;
    public $pass1;
    public $pass2;

    private $_user = false;

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

    public function registration(){

        if ($this->validate() && !$this->checkUser()){

            $customer = new Customer;
            $customer->username = $this->username;
            $customer->phone = $this->phone;
            $customer->password = md5($this->pass1);
            $customer->save();
            return true;

        }

        return false;
    }

    public function validatePassword($attribute, $params){

        if (!$this->hasErrors()){
            if($this->pass1 != $this->pass2){
                $this->addError($attribute, 'Passwords are not equel');
            }
        }
    }

    public function checkUser(){

        if(User::findByUsername($this->username)){

            $this->addError($this->username, 'User is already exist');
            return true;

        }

        return false;

    }

}