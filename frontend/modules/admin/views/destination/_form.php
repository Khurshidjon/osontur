<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var common\models\Destinations $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="destinations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <hr>
    <div class="switch">
        <p>Banner ko'rinishda chiqsinmi?</p>
        <label>
            Yo'q
            <input type="checkbox" checked="checked" id="destinations-is_banner" name="Destinations[is_banner]">
            <span class="lever"></span> Ha
        </label>
    </div>
    <hr>


    <fieldset class="form-check p-3">
        <input class="form-check-input" type="checkbox" id="checkbox1" name="Destinations[status]"/>
        <label class="form-check-label" for="checkbox1">Status</label>
    </fieldset>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
