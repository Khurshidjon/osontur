<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Menus $model */

$this->title = 'Update Menus: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Menuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
