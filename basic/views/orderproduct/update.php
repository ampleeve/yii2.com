<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orderproduct */

$this->title = 'Update Orderproduct: ' . $model->orderID;
$this->params['breadcrumbs'][] = ['label' => 'Orderproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->orderID, 'url' => ['view', 'orderID' => $model->orderID, 'productID' => $model->productID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orderproduct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
