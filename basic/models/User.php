<?php

namespace app\models;
 class User extends \yii\base\Object implements \yii\web\IdentityInterface{

    public $id;
    public $username;
    public $phone;
    public $password;
    public $authKey;
    public $accessToken;


    /**
     * @inheritdoc
     */
    public static function findIdentity($id){

        if($user = Customer::findOne($id)){

            return new static($user->toArray());

        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username){

        if($user = Customer::findOne(['username' => $username])){

            return new static($user->toArray());

        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password){

        return $this->password === md5($password);
    }

     public function createNew($user){
         if($user = Customer::findOne(['username' => $username])){

             return new static($user->toArray());

         }

     }
 }
