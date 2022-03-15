<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JmPersonal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jm-personal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_apellidopaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_apellidomaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_fechanacimiento')->textInput() ?>

    <?= $form->field($model, 'per_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_telefono')->textInput() ?>

    <?= $form->field($model, 'per_correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_fkuser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
