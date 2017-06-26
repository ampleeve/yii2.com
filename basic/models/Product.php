<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $brandID
 * @property integer $typeID
 * @property integer $categoryID
 * @property string $price
 * @property string $vendorCode
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OrderProduct[] $orderProducts
 * @property Order[] $orders
 * @property Brand $brand
 * @property Category $category
 * @property Type $type
 */
 class Product extends \yii\db\ActiveRecord{


     /**
      * @inheritdoc
      */
     public static function tableName(){

         return 'product';
     }

     /**
      * @inheritdoc
      */
     public function rules()
     {
         return [
             [['name', 'price'], 'required'],
             [['brandID', 'typeID', 'categoryID'], 'integer'],
             [['price'], 'number'],
             [['name', 'description'], 'string', 'max' => 500],
             [['vendorCode'], 'string', 'max' => 150],
             [['brandID'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brandID' => 'id']],
             [['categoryID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryID' => 'id']],
             [['typeID'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['typeID' => 'id']],
         ];
     }

     /**
      * @inheritdoc
      */
     public function attributeLabels()
     {
         return [
             'id' => 'ID',
             'name' => 'Name',
             'brandID' => 'Brand ID',
             'typeID' => 'Type ID',
             'categoryID' => 'Category ID',
             'price' => 'Price',
             'vendorCode' => 'Vendor Code',
             'description' => 'Description',
         ];
     }

     /**
      * @return \yii\db\ActiveQuery
      */
     public function getOrderProducts()
     {
         return $this->hasMany(OrderProduct::className(), ['productID' => 'id']);
     }

     /**
      * @return \yii\db\ActiveQuery
      */
     public function getOrders()
     {
         return $this->hasMany(Order::className(), ['id' => 'orderID'])->viaTable('orderProduct', ['productID' => 'id']);
     }

     /**
      * @return \yii\db\ActiveQuery
      */
     public function getBrand()
     {
         return $this->hasOne(Brand::className(), ['id' => 'brandID']);
     }

     /**
      * @return \yii\db\ActiveQuery
      */
     public function getCategory(){

         return $this->hasOne(Category::className(), ['id' => 'categoryID']);

     }

     /**
      * @return \yii\db\ActiveQuery
      */
     public function getType(){

         return $this->hasOne(Type::className(), ['id' => 'typeID']);

     }

     public function behaviors(){
         return [
             [
                 'class' => TimestampBehavior::className()
             ]
         ];
     }


     /*public function save($runValidation = true, $attributeNames = null){
         if($this->isNewRecord) {
             $this->created_at = time();
         }
         $this->updated_at = time();
     }*/


 }
