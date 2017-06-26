<?php
namespace app\components\actions;
use app\components\widgets\MyWidget;

/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 22.06.17
 * Time: 12:12
 */
class DemoAction extends \yii\base\Action{

    public $message;

    public function run(){
        echo MyWidget::widget();
        echo "<br>";
        echo $this->message;
    }

}