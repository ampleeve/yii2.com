<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;

?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $key = 'widget_' . $model->id; // кешируем часть интерфейса вместе со значениями (при этом та часть что в заголовке - не кешируется)
    if($this->beginCache($key,[
            'duration' => 300
    ])){
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'brandID',
                'typeID',
                'categoryID',
                'price',
                'vendorCode',
                'description:html',
            ],
        ]);
        $this->endCache();
    }
    ?>

</div>
