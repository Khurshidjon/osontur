<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;
/** @var common\models\Tours $tours*/
/** @var common\models\Destinations $destination*/
?>

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3><?= $destination ? $destination->translate('title') : 'Destinations' ?></h3>
                    <p><?= Yii::t('app', 'travel_with_us') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

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


<div class="popular_places_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($tours as $tour): ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single_place">
                                <div class="thumb">
                                    <?= Html::img('/toursFiles' . $tour->wallpaper) ?>
                                    <a href="#" class="prise">$<?= $tour->price ?></a>
                                </div>
                                <div class="place_info">
                                    <a href="<?= Url::toRoute(['single-destination', 'id' => $tour->id]) ?>">
                                        <h3><?= $tour->translate('title') ?></h3></a>
                                    <p><?= $tour->destination ? $tour->destination->translate('title') : '' ?></p>
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
    </div>
</div>

<!-- newletter_area_start  -->
<!--<div class="newletter_area overlay">
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
</div>-->
<!-- newletter_area_end  -->
<!--<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Recent Trips</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <?/*= Html::img('/template/img/trip/1.png'); */?>
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <?/*= Html::img('/template/img/trip/2.png'); */?>
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <?/*= Html::img('/template/img/trip/3.png'); */?>
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
