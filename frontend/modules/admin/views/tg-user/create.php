<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TelegramUser $model */

$this->title = 'Create Telegram User';
$this->params['breadcrumbs'][] = ['label' => 'Telegram Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telegram-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
