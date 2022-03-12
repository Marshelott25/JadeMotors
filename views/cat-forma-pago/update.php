<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatFormaPago */

$this->title = 'Actualizar Forma Pago: ' . $model->forpag_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Forma Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->forpag_id, 'url' => ['view', 'forpag_id' => $model->forpag_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-forma-pago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
