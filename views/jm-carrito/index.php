<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JmCarritoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jm-carrito-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Carrito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'car_id',
            'car_cantidad',
            'car_descripcion',
            'car_fkmodelo',
            'car_fkventa',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'car_id' => $model->car_id]);
                 }
            ],
        ],
    ]); ?>


</div>
