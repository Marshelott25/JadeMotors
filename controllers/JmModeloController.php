<?php

namespace app\controllers;

use app\models\JmModelo;
use app\models\JmModeloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JmModeloController implements the CRUD actions for JmModelo model.
 */
class JmModeloController extends Controller
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
     * Lists all JmModelo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JmModeloSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JmModelo model.
     * @param int $mod_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($mod_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($mod_id),
        ]);
    }

    /**
     * Creates a new JmModelo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JmModelo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'mod_id' => $model->mod_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JmModelo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $mod_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($mod_id)
    {
        $model = $this->findModel($mod_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'mod_id' => $model->mod_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JmModelo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $mod_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($mod_id)
    {
        $this->findModel($mod_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JmModelo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $mod_id Id
     * @return JmModelo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($mod_id)
    {
        if (($model = JmModelo::findOne(['mod_id' => $mod_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
