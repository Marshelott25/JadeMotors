<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatFormaPago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-forma-pago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'forpag_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
