<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JmModelo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jm-modelo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mod_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mod_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mod_fkmarca')->textInput() ?>

    <?= $form->field($model, 'mod_fkvehiculo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
