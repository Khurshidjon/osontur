<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\TelegramUser $model */

$this->title = $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Telegram Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="telegram-user-view card">
    <div class="card-header">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    </div>
    <div class="card-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'fio',
                'nickname',
                'username',
                'telegram_id',
                'user_id',
                'language',
                'phone_number',
                'role',
                [
                    'attribute' => 'created_at',
                    'value' => function($model){
                        return date("d.m.Y H:i:s");
                    }
                ],
            ],
        ]) ?>
    </div>

</div>
