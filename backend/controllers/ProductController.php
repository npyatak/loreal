<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;

use common\models\Product;
use common\models\ProductLink;
use common\models\search\ProductSearch;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends CController
{
    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Product();
        $productLinkModels = [new ProductLink, new ProductLink];

        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            if(isset($post['ProductLink'])) {
                $productLinkModels = $model->loadProductLinks($post['ProductLink']);
            }

            if($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'productLinkModels' => $productLinkModels,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $productLinkModels = $model->productLinks;
        if(empty($productLinkModels)) {
            $productLinkModels = [new ProductLink, new ProductLink];
        }

        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            if(isset($post['ProductLink'])) {
                $productLinkModels = $model->loadProductLinks($post['ProductLink']);
            }

            if($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'productLinkModels' => $productLinkModels,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
