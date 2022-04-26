<?php

namespace app\controllers;

use app\models\JmDescuento;
use app\models\JmDescuentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JmDescuentoController implements the CRUD actions for JmDescuento model.
 */
class JmDescuentoController extends Controller
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
     * Lists all JmDescuento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JmDescuentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JmDescuento model.
     * @param int $des_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($des_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($des_id),
        ]);
    }

    /**
     * Creates a new JmDescuento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JmDescuento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'des_id' => $model->des_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JmDescuento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $des_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($des_id)
    {
        $model = $this->findModel($des_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'des_id' => $model->des_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JmDescuento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $des_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($des_id)
    {
        $this->findModel($des_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JmDescuento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $des_id Id
     * @return JmDescuento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($des_id)
    {
        if (($model = JmDescuento::findOne(['des_id' => $des_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
