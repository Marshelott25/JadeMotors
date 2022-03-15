<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JmPersonal */

$this->title = $model->per_id;
$this->params['breadcrumbs'][] = ['label' => 'Jm Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jm-personal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'per_id' => $model->per_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'per_id' => $model->per_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que quieres eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'per_id',
            'per_nombre',
            'per_apellidopaterno',
            'per_apellidomaterno',
            'per_domicilio',
            'per_fechanacimiento',
            'per_rfc',
            'per_telefono',
            'per_correo',
            'per_fkuser',
        ],
    ]) ?>

</div>
