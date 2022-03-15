<?php

namespace app\controllers;

use app\models\JmPersonal;
use app\models\JmPersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JmPersonalController implements the CRUD actions for JmPersonal model.
 */
class JmPersonalController extends Controller
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
     * Lists all JmPersonal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JmPersonalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JmPersonal model.
     * @param int $per_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($per_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($per_id),
        ]);
    }

    /**
     * Creates a new JmPersonal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JmPersonal();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'per_id' => $model->per_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JmPersonal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $per_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($per_id)
    {
        $model = $this->findModel($per_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'per_id' => $model->per_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JmPersonal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $per_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($per_id)
    {
        $this->findModel($per_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JmPersonal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $per_id Id
     * @return JmPersonal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($per_id)
    {
        if (($model = JmPersonal::findOne(['per_id' => $per_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
