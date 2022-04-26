<?php

namespace app\controllers;

use app\models\JmFinanciamiento;
use app\models\JmFinanaciamientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JmFinanciamientoController implements the CRUD actions for JmFinanciamiento model.
 */
class JmFinanciamientoController extends Controller
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
     * Lists all JmFinanciamiento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JmFinanaciamientoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JmFinanciamiento model.
     * @param int $fin_id Fin ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($fin_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($fin_id),
        ]);
    }

    /**
     * Creates a new JmFinanciamiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JmFinanciamiento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'fin_id' => $model->fin_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JmFinanciamiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $fin_id Fin ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($fin_id)
    {
        $model = $this->findModel($fin_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'fin_id' => $model->fin_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JmFinanciamiento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $fin_id Fin ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($fin_id)
    {
        $this->findModel($fin_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JmFinanciamiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $fin_id Fin ID
     * @return JmFinanciamiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($fin_id)
    {
        if (($model = JmFinanciamiento::findOne(['fin_id' => $fin_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
