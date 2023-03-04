<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PostCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>
<style>
    /*.page-footer {*/
    /*    position: relative;*/
    /*    width: 100%;*/
    /*    bottom: 0;*/
    /*}*/
</style>
<div class="post-category-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

        <fieldset class="form-check">
            <input class="form-check-input" type="checkbox" id="checkbox1" name="PostCategory[status]" />
            <label class="form-check-label" for="checkbox1">Status</label>
        </fieldset>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>
