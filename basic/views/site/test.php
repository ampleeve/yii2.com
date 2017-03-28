<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Html;
/** @var \app\models\Test $model */
//echo "<pre>";var_dump($model);die();

    $form = ActiveForm::begin([

        'id' => 'testForm',

    ]);

    echo $form->field($model, 'title')->textInput();
    echo $form->field($model, 'content')->textInput();
    echo $form->field($model, 'date')->dropDownList(['1','2']);

    echo Html::submitButton();

    $form->end();

?>