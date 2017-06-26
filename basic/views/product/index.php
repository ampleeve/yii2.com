<?php



use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//echo "<pre>";var_dump($model);die();

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

        $dataProvider = new \yii\data\ActiveDataProvider([

            'query' => \app\models\Product::find()

        ]);

        echo
        \yii\widgets\ListView::widget([

            'dataProvider' => $dataProvider,
            'itemView' => 'publicviewlist',
            'viewParams' => [

                    'hideBreadcrumbs' => true

            ]
        ]);




    /*
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'brandID',
            'typeID',
            'categoryID',
            'price',
            'vendorCode',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

     */


    ?>
</div>
