<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */
/** @var yii\widgets\ActiveForm $form */
?>
<style>
    .page-footer {
        position: relative;
        width: 100%;
        bottom: 0;
    }
</style>
<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\PostCategory::find()->asArray()->all(), 'id', 'title_uz'), [
            'prompt' => '-- select once --'
    ]) ?>

<!--    --><?//= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

    <fieldset class="form-check p-3">
        <input class="form-check-input" type="checkbox" id="checkbox1" name="Posts[status]"/>
        <label class="form-check-label" for="checkbox1">Status</label>
    </fieldset>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
