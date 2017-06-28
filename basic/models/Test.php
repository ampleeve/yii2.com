<?php
namespace app\models;
use yii\base\Model;

 class Test extends Model{

     public $title;
     public $content;
     public $date;

     const EVENT_TEST = 'test';

     public function attributeLabels(){

        return [
            'title' => 'заголовок',
            'content' => 'контент',
            'description' => 'описание',
        ];
     }

     //public function save(){ // набросок по сохранению файла из формы (пытались в конце 7 урока предпоследним кейсом после алиасов)
       //  $this->content->save
     //}

     public function rules(){

         return [

             [['title', 'content', 'date'], 'required'],
             [['content'], 'file', 'extensions' => 'png, jpg']
         ];
     }

     public function getData(){

         $this->trigger(self::EVENT_TEST);
         return "123";

     }

 }