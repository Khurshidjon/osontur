<?php

use common\models\Tours;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\ToursSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tours';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tours-index card mb-5 table-responsive">
    <div class="card-header">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Tours', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title_uz',
                'title_ru',
                'title_en',
//                'content_uz:ntext',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Tours $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>


</div>
