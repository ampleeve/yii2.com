<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sessions".
 *
 * @property integer $userID
 * @property string $lastUpdate
 * @property string $sid
 *
 * @property Customer $user
 */
class Sessions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sessions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userID', 'lastUpdate'], 'required'],
            [['userID'], 'integer'],
            [['lastUpdate'], 'safe'],
            [['sid'], 'string', 'max' => 45],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['userID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userID' => 'User ID',
            'lastUpdate' => 'Last Update',
            'sid' => 'Sid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Customer::className(), ['id' => 'userID']);
    }
}