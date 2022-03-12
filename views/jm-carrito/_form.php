<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JmCarrito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jm-carrito-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_cantidad')->textInput() ?>

    <?= $form->field($model, 'car_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_fkmodelo')->textInput() ?>

    <?= $form->field($model, 'car_fkventa')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
