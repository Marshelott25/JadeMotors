<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JmPersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jm Personal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jm-personal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'per_id',
            'per_nombre',
            'per_apellidopaterno',
            'per_apellidomaterno',
            'per_domicilio',
            'per_fechanacimiento',
            'per_rfc',
            'per_telefono',
            'per_correo',
            'per_fkuser',
            // 'ejemplo1
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'per_id' => $model->per_id]);
                 }
            ],
        ],
    ]); ?>


</div>
