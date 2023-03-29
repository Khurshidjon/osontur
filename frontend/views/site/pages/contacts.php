<?php
/** @var yii\web\View $this */
/** @var common\models\Applications $application */

use yii\bootstrap5\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

$this->title = "Contacts";
?>

<div class="bradcam_area bradcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Contacts</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Feedback</h2>
            </div>
            <div class="col-lg-7">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <?= $form->field($application, 'fio')->textInput(['placeholder' => 'Full name'])->label(false); ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <?= $form->field($application, 'phone_number')->widget(\yii\widgets\MaskedInput::class, [
                            'mask' => '99 999 99 99',
                            'options' => [
                                'placeholder' => '90 123 45 67'
                            ]
                        ])->label(false); ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="single_input">
                            <?= $form->field($application, 'message')->textarea(['placeholder' => 'Message', 'rows' => 7])->label(false); ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single_input">
                            <?= $form->field($application, 'reCaptcha')->widget(ReCaptcha::className(),[
                                'siteKey' => '6Lfj2NQkAAAAAKOAbf7wxT39eiwJ-bghs9Rgv-sK'
                            ])->label(false); ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="submit_btn">
                            <button class="boxed-btn4" type="submit"><?= Yii::t('submit', 'submit_button')?></button>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-lg-4 offset-lg-1 p-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Toshkent shahri, Mirobod tumani.</h3>
                        <p>Afrosiyob ko'chasi, Farovon MFY, 14/2-uy</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-mobile"></i></span>
                    <div class="media-body">
                        <h3>+998 (90) 399 11 33</h3>
                        <p>Dushanbadan Jumagacha 9.00 - 18.00</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>+998 (90) 399 11 66</h3>
                        <p>Dushanbadan Jumagacha 9.00 - 18.00</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fa fa-telegram"></i></span>
                    <div class="media-body">
                        <h3><a href="https://t.me/osontur_support_bot">Osontur</a></h3>
                        <p><a href="https://t.me/osontur_support_bot">Maslahat olish</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
