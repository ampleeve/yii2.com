<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 29.06.17
 * Time: 13:48
 */
namespace app\commands;
use app\models\Customer;
use yii\console\Controller;

class TestController extends Controller {

    /**
     * Тест консольного приложения под собственным контроллером
     */
    public function actionIndex(){
        echo 'This is test controller'. "\n";
    }

    public function actionFindUser($id){
        $model = Customer::findOne($id);
        echo $model->username . "\n";
    }
}