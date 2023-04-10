<?php

use common\models\Applications;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Destinations;
/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\ApplicationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

</style>
<div class="applications-index card">

    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Applications', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

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
                'phone_number',
                'status',
                [
                    'attribute' => 'destination_id',
                    'value' => function($model){
                        return $model->destination ? $model->destination->title_uz : '';
                    },
                    'filter' => ArrayHelper::map(Destinations::find()->all(), 'id', 'title_uz')
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function($model){
                        return date("d-m-Y H:i:s", $model->created_at);
                    }
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Applications $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>


</div>
