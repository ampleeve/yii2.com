<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Html;
/** @var \app\models\Test $model */
//echo "<pre>";var_dump($model);die();




//phpinfo();

/*echo \yii\jui\DatePicker::widget([

    'model' => \app\models\Test::className(),
    'attribute' => 'content',
    'dateFormat' => 'dd-MM-yyyy',
    'language' => 'ru'

]);*/

    $form = ActiveForm::begin([

        'id' => 'testForm',

    ]);

    echo $form->field($model, 'title')->textInput();
    echo $form->field($model, 'content')->textInput();
    echo $form->field($model, 'date')->widget(\yii\jui\DatePicker::className(),[
        'dateFormat' => 'dd-MM-yyyy',
        'language' => 'ru'
    ]);

    echo Html::submitButton();

    $form->end();

?>