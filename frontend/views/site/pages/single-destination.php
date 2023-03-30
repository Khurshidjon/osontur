<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

/** @var common\models\Tours $tour */
/** @var common\models\Applications $application */
?>

<div class="destination_banner_wrap overlay" style="background-image: url('/toursFiles<?= $tour->wallpaper ?>')">
    <div class="destination_text text-center">
        <h3><?= $tour->translate('title') ?></h3>
        <p>Pixel perfect design with awesome contents</p>
    </div>
</div>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    <?= $tour->translate('content') ?>
                </div>
                <div class="bordered_1px"></div>
                <div class="contact_join">
                    <h3><?= Yii::t('app', 'travel_bron') ?></h3>
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single_input">
                                <?= $form->field($application, 'fio')->textInput(['placeholder' => 'Full name'])->label(false); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_input">
                                <?= $form->field($application, 'phone_number')->widget(\yii\widgets\MaskedInput::class, [
                                    'mask' => '99 999 99 99',
                                    'options' => [
                                        'placeholder' => '90 123 45 67'
                                    ]
                                ])->label(false); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single_input">
                                <?= $form->field($application, 'message')->textarea(['placeholder' => 'Message'])->label(false); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single_input">
                                <?= $form->field($application, 'reCaptcha')->widget(ReCaptcha::className(), [
                                    'siteKey' => '6Lfj2NQkAAAAAKOAbf7wxT39eiwJ-bghs9Rgv-sK'
                                ])->label(false); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="submit_btn">
                                <button class="boxed-btn4" type="submit"><?= Yii::t('app', 'submit_button') ?></button>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- newletter_area_start  -->
<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                            <h4>Subscribe Our Newsletter</h4>
                            <p>Subscribe newsletter to get offers and about
                                new places to discover.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">
                                        <input type="email" placeholder="Your mail">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 " type="submit">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (Yii::$app->session->hasFlash('success')) {
    $message = Yii::t('app', 'success_message');
    $js = <<<JS
Swal.fire({
  icon: 'success',
  title: `$message`,
  showConfirmButton: false,
  timer: 3500
})
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
}
?>
