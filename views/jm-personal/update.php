<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JmPersonal */

$this->title = 'Actualizar Personal: ' . $model->per_id;
$this->params['breadcrumbs'][] = ['label' => 'Jm Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->per_id, 'url' => ['view', 'per_id' => $model->per_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jm-personal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
