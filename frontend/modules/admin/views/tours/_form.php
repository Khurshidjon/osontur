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

    <?= $form->field($model, 'content_uz')->textarea() ?>

    <?= $form->field($model, 'content_ru')->textarea(); ?>

    <?= $form->field($model, 'content_en')->textarea(); ?>

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

<?php
$js = <<<JS
    CKEDITOR.replace('tours-content_uz', {
        filebrowserBrowseUrl: '/adminTemplate/filemanager/dialog.php',
        filebrowserUploadUrl: '/adminTemplate/filemanager/upload.php',
    });
    CKEDITOR.replace('tours-content_ru', {
        filebrowserBrowseUrl: '/adminTemplate/filemanager/dialog.php',
        filebrowserUploadUrl: '/adminTemplate/filemanager/upload.php'
    });
    CKEDITOR.replace('tours-content_en', {
        filebrowserBrowseUrl: '/adminTemplate/filemanager/dialog.php',
        filebrowserUploadUrl: '/adminTemplate/filemanager/upload.php'
    });
    
JS;

$this->registerJs($js, \yii\web\View::POS_END);
//?>

