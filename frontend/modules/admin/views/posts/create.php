<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */

$this->title = 'Create Posts';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .page-footer {
        position: absolute;
        width: 100%;
        bottom: 0;
    }
</style>
<div class="posts-create card">

   <div class="card-body">
       <h1><?= Html::encode($this->title) ?></h1>

       <?= $this->render('_form', [
           'model' => $model,
       ]) ?>
   </div>

</div>
