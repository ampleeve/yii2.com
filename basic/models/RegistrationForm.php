<?php

namespace app\models;

use Yii;
use yii\base\Model;
class RegistrationForm extends Model{

    public $username;
    public $phone;
    public $password;
    public $password2;


    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules(){

        return [
            // username and password are both required
            [['username', 'password', 'password2'], 'required']
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function registration(){

        if ($this->validate()) {
            echo "<pre>"; var_dump($this); die();
            return Yii::$app->user->registration($this);
            //return $this->regUser();
        }
        return false;
    }
}
