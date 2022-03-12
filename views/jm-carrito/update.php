<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JmCarrito */

$this->title = 'Actualizar Carrito: ' . $model->car_id;
$this->params['breadcrumbs'][] = ['label' => 'Carritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_id, 'url' => ['view', 'car_id' => $model->car_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="jm-carrito-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
