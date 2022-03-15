<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatVehiculo */

$this->title = 'Actualizar Vehiculo: ' . $model->veh_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->veh_id, 'url' => ['view', 'veh_id' => $model->veh_id]];
$this->params['breadcrumbs'][] = 'Actulizar';
?>
<div class="cat-vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
