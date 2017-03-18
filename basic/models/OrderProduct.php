<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderProduct".
 *
 * @property integer $orderID
 * @property integer $productID
 * @property integer $count
 *
 * @property Order $order
 * @property Product $product
 */
class OrderProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderProduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderID', 'productID', 'count'], 'required'],
            [['orderID', 'productID', 'count'], 'integer'],
            [['orderID'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['orderID' => 'id']],
            [['productID'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderID' => 'Order ID',
            'productID' => 'Product ID',
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'orderID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productID']);
    }
}