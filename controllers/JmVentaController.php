<?php

namespace app\controllers;

use app\models\JmVenta;
use app\models\JmVentaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JmVentaController implements the CRUD actions for JmVenta model.
 */
class JmVentaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all JmVenta models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JmVentaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JmVenta model.
     * @param int $ven_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ven_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ven_id),
        ]);
    }

    /**
     * Creates a new JmVenta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JmVenta();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ven_id' => $model->ven_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JmVenta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ven_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ven_id)
    {
        $model = $this->findModel($ven_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ven_id' => $model->ven_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JmVenta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ven_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ven_id)
    {
        $this->findModel($ven_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JmVenta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ven_id Id
     * @return JmVenta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ven_id)
    {
        if (($model = JmVenta::findOne(['ven_id' => $ven_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
