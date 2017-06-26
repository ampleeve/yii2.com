<?php
namespace app\components;
use app\components\behaviors\MyBehavior;
use yii\base\Component;

/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 23.06.17
 * Time: 10:39
 */
class MyComponent extends Component{

    public $a;
    public $b;

    public function calculate(){
        echo 'Catch event!';
        //return $this->a * $this->b;
    }

    public function behaviors(){

        return [
            [
            'class' => MyBehavior::className(),
            'message' => 'Hi'
            ]
        ];
    }


}