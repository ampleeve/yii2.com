<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;

?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Имя',
                'value' => function($model){return mb_substr($model->name, 0, 5);}
            ],
            'brandID',
            'typeID',
            'categoryID',
            'price',
            'vendorCode',
            'description:html',
        ],
    ]) ?>

</div>
