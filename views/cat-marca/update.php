<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMarca */

$this->title = 'Actualizar Marca: ' . $model->mar_id;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mar_id, 'url' => ['view', 'mar_id' => $model->mar_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-marca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
