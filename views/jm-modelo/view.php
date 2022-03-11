<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JmModelo */

$this->title = $model->mod_id;
$this->params['breadcrumbs'][] = ['label' => 'Modelos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jm-modelo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'mod_id' => $model->mod_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'mod_id' => $model->mod_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Desea eliminar este modelo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mod_id',
            'mod_nombre',
            'mod_precio',
            'mod_fkmarca',
            'mod_fkvehiculo',
        ],
    ]) ?>

</div>
