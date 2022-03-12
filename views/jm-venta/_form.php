<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JmVenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jm-venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ven_fecha')->textInput() ?>

    <?= $form->field($model, 'ven_pedidonumero')->textInput() ?>

    <?= $form->field($model, 'ven_estatus')->dropDownList([ 'PAGADO' => 'PAGADO', 'NO PAGADO' => 'NO PAGADO', 'ENTREGADO' => 'ENTREGADO', 'NO ENTREGADO' => 'NO ENTREGADO', 'PENDIENTE' => 'PENDIENTE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ven_fkcliente')->textInput() ?>

    <?= $form->field($model, 'ven_fkvendedor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
