<?php

use common\models\Posts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\PostsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .page-footer {
        position: absolute;
        width: 100%;
        bottom: 0;
    }
</style>
<div class="posts-index card">

    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
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
                'title_uz',
                'title_ru',
                'title_en',
                'content_uz:ntext',
                //'content_ru:ntext',
                //'content_en:ntext',
                //'category_id',
                //'tags',
                //'status',
                //'created_at',
                //'updated_at',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Posts $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>


</div>
