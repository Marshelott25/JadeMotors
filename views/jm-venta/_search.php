<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JmVentaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jm-venta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ven_id') ?>

    <?= $form->field($model, 'ven_fecha') ?>

    <?= $form->field($model, 'ven_pedidonumero') ?>

    <?= $form->field($model, 'ven_estatus') ?>

    <?= $form->field($model, 'ven_fkcliente') ?>

    <?php // echo $form->field($model, 'ven_fkvendedor') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
