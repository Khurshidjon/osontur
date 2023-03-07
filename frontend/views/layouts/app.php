<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Menus;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
<!--    <title>Travelo</title>-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="./template/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style>
        .custom-list{
            /*width: 5em;*/
            /*padding-left: 20px;*/
            text-align: center;
        }
        .custom-list-item {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #c60c90;
        }
        .custom-list-item > a {
            width: 100%;
            display: block;
            padding: 10px;
            /*padding: 100px*/
        }
        .custom-list-item > a:hover {
            background-color: rgba(0,0,0, 0.2);
        }
        .custom-list-item.active a {
            color: red;
        }
    </style>
</head>

<body>
<?php $this->beginBody() ?>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <?= Html::img('/template/img/logo.jpg', ['style' => 'width: 70px'])?>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <?php
                                        $lang = '/'.  Yii::$app->language != 'uz' ?  Yii::$app->language : '';

                                        $currentUrl = Yii::$app->request->url ;
                                    ?>
                                    <ul id="navigation">
                                        <?php foreach (Menus::find()->all() as $value): ?>
                                            <li><a class="active" href="<?= Url::to([$value->link_path, 'lang' => $lang])   ?>"><?= $value->translate('title') ?></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="btn-group dropleft mr-4">
                                    <button type="button" class="boxed-btn4 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= Yii::$app->language ?>
                                    </button>
                                    <div class="dropdown-menu">
                                       <ul class="custom-list">
                                           <li class="custom-list-item <?= Yii::$app->language == 'uz' ? 'active' : ''?>"><a href="<?= Url::to([$currentUrl, 'lang' => 'uz'])?>">Uzb</a></li>
                                           <li class="custom-list-item <?= Yii::$app->language == 'ru' ? 'active' : ''?>"><a href="<?= Url::to([$currentUrl, 'lang' => 'ru'])?>">Рус</a></li>
                                           <li class="custom-list-item <?= Yii::$app->language == 'en' ? 'active' : ''?>"><a href="<?= Url::to([$currentUrl, 'lang' => 'en'])?>">Eng</a></li>
                                       </ul>
                                    </div>
                                </div>
                                <div class="number">
                                    <p> <i class="fa fa-phone"></i> 998 (90) 399 11 33</p>
                                </div>
                                <div class="social_links d-none d-xl-block">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->
<?= $content ?>
<!-- footer begin -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="./template/img/logo.jpg" alt="" width="120">
                            </a>
                        </div>
                        <p>Toshkent shahri, Mirobod tumani, <br> AFROSIYOB KO'CHASI, FAROVON MFY, 14/2-UY <br>
                            <a href="tel:+998903991133">+998(90) 399 11 33</a> <br>
                            <a href="tel:+998903991166">+998(90) 399 11 66</a> <br>
                            <a href="#">info@osontur.uz</a>
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                       <div class="d-block d-lg-none d-xl-none">
                           <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?= Yii::$app->language ?>
                               <!--                                        --><?//= Yii::$app->request->url ?>
                           </button>
                           <div class="dropdown-menu">
                               <ul class="custom-list">
                                   <li class="custom-list-item <?= Yii::$app->language == 'uz' ? 'active' : ''?>"><a href="<?= Url::to([Yii::$app->request->url, 'lang' => 'uz'])?>">Uzb</a></li>
                                   <li class="custom-list-item <?= Yii::$app->language == 'ru' ? 'active' : ''?>"><a href="<?= Url::to([Yii::$app->request->url, 'lang' => 'ru'])?>">Рус</a></li>
                                   <li class="custom-list-item <?= Yii::$app->language == 'en' ? 'active' : ''?>"><a href="<?= Url::to([Yii::$app->request->url, 'lang' => 'en'])?>">Eng</a></li>
                               </ul>
                           </div>
                       </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6 col-lg-8">
                    <div class="footer_widget">
                        <div style="position:relative;overflow:hidden;">
                            <a href="https://yandex.uz/maps/10335/tashkent/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Toshkent</a><a href="https://yandex.uz/maps/10335/tashkent/house/YkAYdAFpT0cFQFprfX54eX9qYg==/?ll=69.270371%2C41.298402&utm_medium=mapframe&utm_source=maps&z=17.78" style="color:#eee;font-size:12px;position:absolute;top:14px;">Afrosiyob koʻchasi, 14/2 — Yandex Xarita</a><iframe src="https://yandex.uz/map-widget/v1/?ll=69.270371%2C41.298402&mode=whatshere&whatshere%5Bpoint%5D=69.269464%2C41.298479&whatshere%5Bzoom%5D=17&z=17.78" width="100%" height="360" frameborder="0" allowfullscreen="true" style="position:relative;"></iframe>
                        </div>
                    </div>
                </div>
<!--                <div class="col-xl-3 col-md-6 col-lg-3">-->
<!--                    <div class="footer_widget">-->
<!--                        <h3 class="footer_title">-->
<!--                            Instagram-->
<!--                        </h3>-->
<!--                        <div class="instagram_feed">-->
<!--                            <div class="single_insta">-->
<!--                                <a href="#">-->
<!--                                    <img src="./template/img/instagram/1.png" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="single_insta">-->
<!--                                <a href="#">-->
<!--                                    <img src="./template/img/instagram/2.png" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="single_insta">-->
<!--                                <a href="#">-->
<!--                                    <img src="./template/img/instagram/3.png" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="single_insta">-->
<!--                                <a href="#">-->
<!--                                    <img src="./template/img/instagram/4.png" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="single_insta">-->
<!--                                <a href="#">-->
<!--                                    <img src="./template/img/instagram/5.png" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="single_insta">-->
<!--                                <a href="#">-->
<!--                                    <img src="./template/img/instagram/6.png" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://osontur.uz" target="_self">Osontur</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Modal -->
<div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="serch_form">
                <input type="text" placeholder="Search" >
                <button type="submit">search</button>
            </div>
        </div>
    </div>
</div>
<!-- link that opens popup -->
<?php
$js = <<<JS
 $('#datepicker').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-caret-down"></span>'
        }
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
