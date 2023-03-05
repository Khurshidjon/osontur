<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TelegramUser $model */

$this->title = 'Update Telegram User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Telegram Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="telegram-user-update card">

   <div class="card-header">
       <h1><?= Html::encode($this->title) ?></h1>
   </div>

    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
