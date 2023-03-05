<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Applications $model */

$this->title = 'Create Applications';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-create card">
    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

    </div>

    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
