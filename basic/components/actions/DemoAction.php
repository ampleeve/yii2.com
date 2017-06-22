<?php
namespace app\components\actions;
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 22.06.17
 * Time: 12:12
 */
class DemoAction extends \yii\base\Action{

    public $message;

    public function run(){
        echo $this->message;
    }

}