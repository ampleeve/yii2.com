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
    $key = 'widget_' . $model->id;
    if($this->beginCache($key,[
            'duration' => 300
    ])){
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'label' => 'Имя'
                ],
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
