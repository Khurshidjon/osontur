<?php

/** @var yii\web\View $this */
/** @var common\models\Destinations $wallpapers */
/** @var common\models\Destinations $destinations */
/** @var common\models\Tours $tours */
/** @var common\models\Applications $application */

$this->title = 'Osontur | Bosh sahifa';

use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

//$lang = Yii::$app->language;
//echo Url::to(['/module/controller/action', 'lang' => $lang])
?>
<style>
    .modal.explore_form .modal-dialog {
        width: 100%;
        position: fixed;
        top: 0;
        right: 0;
    }

    .modal.explore_form .btn-primary {
        background-color: #8f2686;
        color: #fff;
        border-color: #8f2686;
    }
    #my-captcha-image {
        padding-bottom: 10px;
        cursor: pointer;
    }
</style>
<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <?php foreach ($wallpapers as $wallpaper): ?>
            <div class="single_slider d-flex align-items-center slider_bg_1 overlay"
                 style="background-image: url('/toursFiles<?= $wallpaper->wallpaper ?>')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3><?= $wallpaper->translate('title') ?></h3>
                                <p><?= Yii::t('app', 'travel_with_us') ?></p>
                                <button type="button" class="btn btn-primary boxed-btn3" data-toggle="modal"
                                        data-target="#staticBackdrop"><?= Yii::t('app', 'booking') ?></button>
                                <a href="<?= Url::toRoute(['single-destination', 'id' => $wallpaper->id]) ?>" class="btn btn-outline-primary boxed-btn3"><?= Yii::t('app', 'learn_more') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal explore_form fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog mr-lg-3 mr-md-3 mr-xl-3 mr-0">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= $form->field($application, 'fio')->textInput(['placeholder' => "F.I.O"])->label(false); ?>

                <?= $form->field($application, 'phone_number', [
                    'template' => '{beginLabel}{labelTitle}{endLabel}<div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+998</span>
                        </div>
                        {input}{error}{hint}
                        </div>'
                ])->widget(\yii\widgets\MaskedInput::class, [
                    'mask' => '99 999 99 99',
                    'options' => [
                        'placeholder' => '90 123 45 67'
                    ]])->label(false); ?>

                <?= $form->field($application, 'reCaptcha')->widget(ReCaptcha::className(),[
                        'siteKey' => '6Lfj2NQkAAAAAKOAbf7wxT39eiwJ-bghs9Rgv-sK'
                ])->label(false); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!-- slider_area_end -->

<!-- where_togo_area_start  -->
<div class="where_togo_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="form_area">
                    <h3><?= Yii::t('app', 'where_want') ?></h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" action="#">
                        <div class="input_field">
                            <input type="text" placeholder="<?= Yii::t('app', 'where_want_place') ?>">
                        </div>
                        <div class="input_field">
                            <input id="datepicker" placeholder="<?= Yii::t('app', 'where_want_date') ?>">
                        </div>
                        <div class="input_field">
                            <select>
                                <option data-display="<?= Yii::t('app', 'where_want_type') ?>"><?= Yii::t('app', 'where_want_type') ?></option>
                                <option value="1">Some option</option>
                                <option value="2">Another option</option>
                            </select>
                        </div>
                        <div class="search_btn">
                            <button class="boxed-btn4 " type="submit"><?= Yii::t('app', 'search_button') ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- where_togo_area_end  -->

<!-- popular_destination_area_start  -->
<div class="popular_destination_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3><?= Yii::t('app', 'popular_dests') ?></h3>
                    <p><?= Yii::t('app', 'lets_go') ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($destinations as $destination): ?>
                <div class="col-lg-4 col-md-6">
                    <a href="<?= Url::toRoute(['tours-list', 'id' => $destination->id]) ?>">
                        <object>
                            <div class="single_destination">
                                <div class="thumb">
                                    <?= Html::img('/destinationFiles/' . $destination->wallpaper); ?>
                                </div>
                                <div class="content">
                                    <p class="d-flex align-items-center"><?= $destination->title_uz ?> <a
                                                href="<?= Url::toRoute(['tours-list', 'id' => $destination->id]) ?>"> 07
                                            Places</a></p>
                                </div>
                            </div>
                        </object>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- popular_destination_area_end  -->

<!-- newletter_area_start  -->
<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                            <h4><?= Yii::t('app', 'subscribe_title') ?></h4>
                            <p><?= Yii::t('app', 'subscribe_description') ?></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">
                                        <input type="email" placeholder="<?= Yii::t('app', 'subscribe_placeholder') ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 "
                                                type="submit"><?= Yii::t('app', 'subscribe_button') ?></button>
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
<!-- newletter_area_end  -->

<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3><?= Yii::t('app', 'popular_places') ?></h3>
                    <p><?= Yii::t('app', 'lets_go') ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($tours as $tour): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <?= Html::img('/toursFiles' . $tour->wallpaper) ?>
                            <a href="#" class="prise">$<?= $tour->price ?></a>
                        </div>
                        <div class="place_info">
                            <a href="<?= Url::toRoute(['single-destination', 'id' => $tour->id]) ?>">
                                <h3><?= $tour->title_uz ?></h3></a>
                            <p><?= $tour->destination ? $tour->destination->title_uz : '' ?></p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <a href="#">(20 Review)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#"><?= $tour->days ?> Days</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="more_place_btn text-center">
                    <a class="boxed-btn4" href="<?= Url::toRoute(['tours-list']) ?>"><?= Yii::t('app', 'more_places_button') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="video_area video_bg overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video_wrap text-center">
                    <h3><?= Yii::t('app', 'enjoy_video') ?></h3>
                    <div class="video_icon">
                        <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="travel_variation_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <?= Html::img('/template/img/svg_icon/1.svg') ?>
                    </div>
                    <h3><?= Yii::t('app', 'comfort_title') ?></h3>
                    <p><?= Yii::t('app', 'comfort_content') ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <?= Html::img('/template/img/svg_icon/2.svg') ?>
                    </div>
                    <h3><?= Yii::t('app', 'lux_hotel_title') ?></h3>
                    <p><?= Yii::t('app', 'lux_hotel_content') ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <?= Html::img('/template/img/svg_icon/3.svg') ?>
                    </div>
                    <h3><?= Yii::t('app', 'travel_title') ?></h3>
                    <p><?= Yii::t('app', 'travel_content') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$js = <<<JS
    // $('#my-captcha-image').on('click', function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: '/site/refresh-captcha',
    //         success: (response) => {
    //             $('#my-captcha-image').attr('src', response);         
    //         }
    //     })
    // })
JS;


$this->registerJs($js, \yii\web\View::POS_READY); ?>
