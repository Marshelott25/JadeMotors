<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JmVenta */

$this->title = 'Actualizar Venta: ' . $model->ven_id;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ven_id, 'url' => ['view', 'ven_id' => $model->ven_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="jm-venta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
