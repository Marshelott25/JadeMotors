<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JmModelo */

$this->title = 'Actualizar Modelo: ' . $model->mod_id;
$this->params['breadcrumbs'][] = ['label' => 'Modelos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mod_id, 'url' => ['view', 'mod_id' => $model->mod_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="jm-modelo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
