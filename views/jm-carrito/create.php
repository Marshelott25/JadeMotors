<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JmCarrito */

$this->title = 'Crear Carrito';
$this->params['breadcrumbs'][] = ['label' => 'Carritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jm-carrito-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
