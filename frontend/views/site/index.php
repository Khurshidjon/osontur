<?php

/** @var yii\web\View $this */
/** @var common\models\Destinations $wallpapers */
/** @var common\models\Destinations $destinations */
/** @var common\models\Tours $tours */

$this->title = 'Osontur | Bosh sahifa';
use yii\helpers\Url;
use yii\bootstrap5\Html;

//$lang = Yii::$app->language;
//echo Url::to(['/module/controller/action', 'lang' => $lang])
?>
<style>
    .modal.explore_form .modal-dialog {
        width:100%;
        margin-right: 2em;
        position:fixed;
        top:0;
        right:0;
    }
    .modal.explore_form .btn-primary {
        background-color: #8f2686;
        color: #fff;
        border-color: #8f2686;
    }
</style>
<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <?php foreach ($wallpapers as $wallpaper): ?>
            <div class="single_slider d-flex align-items-center slider_bg_1 overlay" style="background-image: url('/destinationFiles<?= $wallpaper->wallpaper ?>')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3><?= $wallpaper->title_uz ?></h3>
                                <p><?= Yii::t('app', 'travel_with_us')?></p>
                                <button type="button" class="btn btn-primary boxed-btn3" data-toggle="modal" data-target="#staticBackdrop"><?= Yii::t('app', 'booking')?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal explore_form fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" aria-label="FIO" placeholder="F.I.O" class="form-control">
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+998</span>
                        </div>
                        <input type="text" aria-label="Phone number" placeholder="Phone number" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
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
                    <h3><?= Yii::t('app', 'where_want')?></h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" action="#">
                        <div class="input_field">
                            <input type="text" placeholder="<?= Yii::t('app', 'where_want_place')?>">
                        </div>
                        <div class="input_field">
                            <input id="datepicker" placeholder="<?= Yii::t('app', 'where_want_date')?>">
                        </div>
                        <div class="input_field">
                            <select>
                                <option data-display="<?= Yii::t('app', 'where_want_type')?>"><?= Yii::t('app', 'where_want_type')?></option>
                                <option value="1">Some option</option>
                                <option value="2">Another option</option>
                            </select>
                        </div>
                        <div class="search_btn">
                            <button class="boxed-btn4 " type="submit" ><?= Yii::t('app', 'search_button')?></button>
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
                    <h3><?= Yii::t('app', 'popular_dests')?></h3>
                    <p><?= Yii::t('app', 'lets_go')?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($destinations as $destination): ?>
                <div class="col-lg-4 col-md-6">
                    <a href="<?= Url::toRoute(['tours-list', 'id' => $destination->id])?>">
                        <object>
                            <div class="single_destination">
                                <div class="thumb">
                                    <?= Html::img('/destinationFiles/'.$destination->wallpaper); ?>
                                </div>
                                <div class="content">
                                    <p class="d-flex align-items-center"><?= $destination->title_uz ?> <a href="<?= Url::toRoute(['tours-list', 'id' => $destination->id])?>">  07 Places</a> </p>
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
                            <h4><?= Yii::t('app', 'subscribe_title')?></h4>
                            <p><?= Yii::t('app', 'subscribe_description')?></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">
                                        <input type="email" placeholder="<?= Yii::t('app', 'subscribe_placeholder')?>" >
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 " type="submit" ><?= Yii::t('app', 'subscribe_button')?></button>
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
                    <h3><?= Yii::t('app', 'popular_places')?></h3>
                    <p><?= Yii::t('app', 'lets_go')?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($tours as $tour): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <?= Html::img('/toursFiles'.$tour->wallpaper)?>
                            <a href="#" class="prise">$<?= $tour->price ?></a>
                        </div>
                        <div class="place_info">
                            <a href="<?= Url::toRoute(['single-destination', 'id' => $tour->id])?>"><h3><?= $tour->title_uz ?></h3></a>
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
                    <a class="boxed-btn4" href="#"><?= Yii::t('app', 'more_places_button')?></a>
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
                    <h3><?= Yii::t('app', 'enjoy_video')?></h3>
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

<!---->
<!--<div class="testimonial_area">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-12">-->
<!--                <div class="testmonial_active owl-carousel">-->
<!--                    <div class="single_carousel">-->
<!--                        <div class="row justify-content-center">-->
<!--                            <div class="col-lg-8">-->
<!--                                <div class="single_testmonial text-center">-->
<!--                                    <div class="author_thumb">-->
<!--                                        <img src="./template/img/testmonial/author.png" alt="">-->
<!--                                    </div>-->
<!--                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>-->
<!--                                    <div class="testmonial_author">-->
<!--                                        <h3>- Micky Mouse</h3>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="single_carousel">-->
<!--                        <div class="row justify-content-center">-->
<!--                            <div class="col-lg-8">-->
<!--                                <div class="single_testmonial text-center">-->
<!--                                    <div class="author_thumb">-->
<!--                                        <img src="./template/img/testmonial/author.png" alt="">-->
<!--                                    </div>-->
<!--                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>-->
<!--                                    <div class="testmonial_author">-->
<!--                                        <h3>- Tom Mouse</h3>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="single_carousel">-->
<!--                        <div class="row justify-content-center">-->
<!--                            <div class="col-lg-8">-->
<!--                                <div class="single_testmonial text-center">-->
<!--                                    <div class="author_thumb">-->
<!--                                        <img src="./template/img/testmonial/author.png" alt="">-->
<!--                                    </div>-->
<!--                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>-->
<!--                                    <div class="testmonial_author">-->
<!--                                        <h3>- Jerry Mouse</h3>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<div class="travel_variation_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="./template/img/svg_icon/1.svg" alt="">
                    </div>
                    <h3>Comfortable Journey</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="./template/img/svg_icon/2.svg" alt="">
                    </div>
                    <h3>Luxuries Hotel</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="./template/img/svg_icon/3.svg" alt="">
                    </div>
                    <h3>Travel Guide</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="recent_trip_area">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-6">-->
<!--                <div class="section_title text-center mb_70">-->
<!--                    <h3>Recent Trips</h3>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div class="single_trip">-->
<!--                    <div class="thumb">-->
<!--                        <img src="./template/img/trip/1.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="info">-->
<!--                        <div class="date">-->
<!--                            <span>Oct 12, 2019</span>-->
<!--                        </div>-->
<!--                        <a href="#">-->
<!--                            <h3>Journeys Are Best Measured In-->
<!--                                New Friends</h3>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div class="single_trip">-->
<!--                    <div class="thumb">-->
<!--                        <img src="./template/img/trip/2.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="info">-->
<!--                        <div class="date">-->
<!--                            <span>Oct 12, 2019</span>-->
<!--                        </div>-->
<!--                        <a href="#">-->
<!--                            <h3>Journeys Are Best Measured In-->
<!--                                New Friends</h3>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div class="single_trip">-->
<!--                    <div class="thumb">-->
<!--                        <img src="./template/img/trip/3.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="info">-->
<!--                        <div class="date">-->
<!--                            <span>Oct 12, 2019</span>-->
<!--                        </div>-->
<!--                        <a href="#">-->
<!--                            <h3>Journeys Are Best Measured In-->
<!--                                New Friends</h3>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

