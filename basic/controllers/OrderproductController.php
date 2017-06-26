<?php

namespace app\controllers;

use Yii;
use app\models\OrderProduct;
use app\models\OrderProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderProductController implements the CRUD actions for OrderProduct model.
 */
class OrderproductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all OrderProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderProduct model.
     * @param integer $orderID
     * @param integer $productID
     * @return mixed
     */
    public function actionView($orderID, $productID)
    {
        return $this->render('view', [
            'model' => $this->findModel($orderID, $productID),
        ]);
    }

    /**
     * Creates a new OrderProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'orderID' => $model->orderID, 'productID' => $model->productID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OrderProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $orderID
     * @param integer $productID
     * @return mixed
     */
    public function actionUpdate($orderID, $productID)
    {
        $model = $this->findModel($orderID, $productID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'orderID' => $model->orderID, 'productID' => $model->productID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OrderProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $orderID
     * @param integer $productID
     * @return mixed
     */
    public function actionDelete($orderID, $productID)
    {
        $this->findModel($orderID, $productID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $orderID
     * @param integer $productID
     * @return OrderProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($orderID, $productID)
    {
        if (($model = OrderProduct::findOne(['orderID' => $orderID, 'productID' => $productID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
