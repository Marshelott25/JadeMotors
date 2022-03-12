<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JmCarritoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jm-carrito-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'car_cantidad') ?>

    <?= $form->field($model, 'car_descripcion') ?>

    <?= $form->field($model, 'car_fkmodelo') ?>

    <?= $form->field($model, 'car_fkventa') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
