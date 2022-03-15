<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JmPersonalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jm-personal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'per_id') ?>

    <?= $form->field($model, 'per_nombre') ?>

    <?= $form->field($model, 'per_apellidopaterno') ?>

    <?= $form->field($model, 'per_apellidomaterno') ?>

    <?= $form->field($model, 'per_domicilio') ?>

    <?php // echo $form->field($model, 'per_fechanacimiento') ?>

    <?php // echo $form->field($model, 'per_rfc') ?>

    <?php // echo $form->field($model, 'per_telefono') ?>

    <?php // echo $form->field($model, 'per_correo') ?>

    <?php // echo $form->field($model, 'per_fkuser') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
