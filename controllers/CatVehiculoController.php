<?php

namespace app\controllers;

use app\models\CatVehiculo;
use app\models\CatVehiculoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatVehiculoController implements the CRUD actions for CatVehiculo model.
 */
class CatVehiculoController extends Controller
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
     * Lists all CatVehiculo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatVehiculoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatVehiculo model.
     * @param int $veh_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($veh_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($veh_id),
        ]);
    }

    /**
     * Creates a new CatVehiculo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatVehiculo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'veh_id' => $model->veh_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatVehiculo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $veh_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($veh_id)
    {
        $model = $this->findModel($veh_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'veh_id' => $model->veh_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatVehiculo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $veh_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($veh_id)
    {
        $this->findModel($veh_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatVehiculo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $veh_id Id
     * @return CatVehiculo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($veh_id)
    {
        if (($model = CatVehiculo::findOne(['veh_id' => $veh_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
