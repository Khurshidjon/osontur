<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Applications $model */

$this->title = 'Update Applications: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="applications-update card">

    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

    </div>

    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
