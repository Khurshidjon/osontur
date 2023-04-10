<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Applications $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="applications-view card">

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
                'phone_number',
                [
                    'attribute' => 'message',
                    'value' => function($model){
                        return $model->message;
                    }
                ],
                [
                    'attribute' => 'destination_id',
                    'value' => function($model){
                        return $model->destination ? $model->destination->title_uz : '';
                    }
                ],
                'status',
                [
                    'attribute' => 'created_at',
                    'value' => function($model){
                        return date("d.m.Y H:i:s", $model->created_at);
                    }
                ],
            ],
        ]) ?>

    </div>
</div>
