<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Destinations $model */

$this->title = 'Update Destinations: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Destinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="destinations-update card  mb-5">

    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>

