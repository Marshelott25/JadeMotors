<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatFormaPagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forma Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-forma-pago-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Forma Pago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'forpag_id',
            'forpag_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'forpag_id' => $model->forpag_id]);
                 }
            ],
        ],
    ]); ?>


</div>
