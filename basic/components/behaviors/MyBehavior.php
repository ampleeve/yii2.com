<?php
namespace app\components\behaviors;
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 23.06.17
 * Time: 10:34
 */
class MyBehavior extends \yii\base\Behavior{

    public $message;

    public function showMessage(){
        echo $this->message;
        echo "<br>";
        echo $this->owner->calculate();
    }

}