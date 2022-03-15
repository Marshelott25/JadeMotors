<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatVehiculo */

$this->title = 'Crear Vehiculo';
$this->params['breadcrumbs'][] = ['label' => 'Vehículos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
