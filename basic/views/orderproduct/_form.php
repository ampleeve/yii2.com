<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orderproduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderID')->textInput() ?>

    <?= $form->field($model, 'productID')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
