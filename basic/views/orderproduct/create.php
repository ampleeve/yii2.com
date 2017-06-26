<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orderproduct */

$this->title = 'Create Orderproduct';
$this->params['breadcrumbs'][] = ['label' => 'Orderproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
