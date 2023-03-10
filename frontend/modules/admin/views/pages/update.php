<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pages $model */

$this->title = 'Update Pages: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-update card">

    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
