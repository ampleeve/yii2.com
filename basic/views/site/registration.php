<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="site-login">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Please fill out the following fields to Sign up:</p>

        <?php $form = ActiveForm::begin([

            'id' => 'regForm',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'phone')->textInput()?>

        <?= $form->field($model, 'pass1')->passwordInput() ?>
        
        <?= $form->field($model, 'pass2')->passwordInput() ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary', 'name' => 'reg-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

        <div class="col-lg-offset-1" style="color:#999;">
            Or you may <a href="?r=site/login">login.</a>
        </div>

    </div>
