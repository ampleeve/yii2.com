<?php
namespace app\models;
use yii\base\Model;

 class Test extends Model{

     public $title;
     public $content;
     public $date;

     public function attributeLabels(){

        return [

          'title' => 'заголовок'

        ];
     }

     public function rules(){

         return [

             [['title', 'content', 'date'], 'required']
         ];
     }

 }