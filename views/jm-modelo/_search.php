<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JmModeloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jm-modelo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mod_id') ?>

    <?= $form->field($model, 'mod_nombre') ?>

    <?= $form->field($model, 'mod_precio') ?>

    <?= $form->field($model, 'mod_fkmarca') ?>

    <?= $form->field($model, 'mod_fkvehiculo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
