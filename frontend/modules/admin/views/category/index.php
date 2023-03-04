<?php

use common\models\PostCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\PostCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Post Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .page-footer {
        position: absolute;
        width: 100%;
        bottom: 0;
    }
</style>
<div class="post-category-index card">
    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Post Category', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

    </div>
   <div class="card-body">

       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

       <?= GridView::widget([
           'dataProvider' => $dataProvider,
           'filterModel' => $searchModel,
           'columns' => [
               ['class' => 'yii\grid\SerialColumn'],

               'id',
               'title_uz',
               'title_ru',
               'title_en',
               'status',
               //'created_at',
               //'updated_at',
               [
                   'class' => ActionColumn::className(),
                   'urlCreator' => function ($action, PostCategory $model, $key, $index, $column) {
                       return Url::toRoute([$action, 'id' => $model->id]);
                   }
               ],
           ],
       ]); ?>

   </div>

</div>
