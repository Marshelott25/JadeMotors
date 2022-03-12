<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatFormaPago */

$this->title = 'Crear Forma Pago';
$this->params['breadcrumbs'][] = ['label' => 'Forma Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-forma-pago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
