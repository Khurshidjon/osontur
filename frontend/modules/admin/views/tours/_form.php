<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Destinations;
use mihaildev\ckeditor\CKEditor;

/** @var yii\web\View $this */
/** @var common\models\Tours $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tours-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_uz')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]) ?>

    <?= $form->field($model, 'content_ru')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]) ?>
    <?= $form->field($model, 'content_en')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'days')->textInput() ?>

    <?= $form->field($model, 'destination_id')->dropDownList(ArrayHelper::map(Destinations::find()->asArray()->all(), 'id', 'title_uz'), [
        'prompt' => '-- select once --'
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
