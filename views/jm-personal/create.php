<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JmPersonal */

$this->title = 'Nuevo Personal';
$this->params['breadcrumbs'][] = ['label' => 'Jm Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jm-personal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
