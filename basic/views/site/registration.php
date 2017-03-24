<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
/** @var \app\models\Test $model */
//echo "<pre>";var_dump($model);die();

$this->title = 'Registration';

$form = ActiveForm::begin([

    'id' => 'regForm',

]);

echo $form->field($model, 'username')->textInput();
echo $form->field($model, 'phone')->textInput();
echo $form->field($model, 'pass1')->passwordInput();
echo $form->field($model, 'pass2')->passwordInput();

echo Html::submitButton();

$form->end();

?>