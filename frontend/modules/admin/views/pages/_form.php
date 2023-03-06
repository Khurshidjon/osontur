<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Menus;

/** @var yii\web\View $this */
/** @var common\models\Pages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_uz')->textarea() ?>

    <?= $form->field($model, 'content_ru')->textarea(); ?>

    <?= $form->field($model, 'content_en')->textarea(); ?>

    <?= $form->field($model, 'photo')->fileInput(); ?>

    <?= $form->field($model, 'menu_id')->dropDownList(ArrayHelper::map(Menus::find()->all(), 'id', 'title_uz'), [
            'prompt' => '-- select once --'
    ]); ?>

    <?= $form->field($model, 'status')->dropDownList([
            1 => 'Active',
            2 => 'No active',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
    CKEDITOR.replace('pages-content_uz', {
        filebrowserBrowseUrl: '/adminTemplate/filemanager/dialog.php',
        filebrowserUploadUrl: '/adminTemplate/filemanager/upload.php',
    });
    CKEDITOR.replace('pages-content_ru', {
        filebrowserBrowseUrl: '/adminTemplate/filemanager/dialog.php',
        filebrowserUploadUrl: '/adminTemplate/filemanager/upload.php'
    });
    CKEDITOR.replace('pages-content_en', {
        filebrowserBrowseUrl: '/adminTemplate/filemanager/dialog.php',
        filebrowserUploadUrl: '/adminTemplate/filemanager/upload.php'
    });
    
JS;

$this->registerJs($js, \yii\web\View::POS_END);
//?>
