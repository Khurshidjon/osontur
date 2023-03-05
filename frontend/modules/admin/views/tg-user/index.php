<?php

use common\models\TelegramUser;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\TelegramUserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Telegram Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telegram-user-index card">

    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

<!--        <p>-->
<!--            --><?//= Html::a('Create Telegram User', ['create'], ['class' => 'btn btn-success']) ?>
<!--        </p>-->

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </div>
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'fio',
                'nickname',
                'username',
                'telegram_id',
                //'user_id',
                //'language',
                //'phone_number',
                //'step',
                //'role',
                //'status',
                //'created_at',
                //'updated_at',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, TelegramUser $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>

</div>
