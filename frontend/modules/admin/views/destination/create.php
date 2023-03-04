<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Destinations $model */

$this->title = 'Create Destinations';
$this->params['breadcrumbs'][] = ['label' => 'Destinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="destinations-create card  mb-5">

    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
