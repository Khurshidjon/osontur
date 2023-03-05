<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\TelegramUser $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="telegram-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'role')->dropDownList([
            1 => 'Oddiy foydalanuvchi',
            2 => 'Admin',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
