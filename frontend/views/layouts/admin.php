<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AdminAsset;
use yii\bootstrap5\Html;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            /*.page-footer{*/
            /*    position: relative;*/
            /*    width: 100%;*/
            /*    bottom: 0;*/
            /*    margin-bottom: 0;*/
            /*    !*height: 100px;*!*/
            /*}*/
        </style>
    </head>

    <body class="fixed-sn white-skin">

    <!-- Main Navigation -->
    <header>

        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar">

                <!-- Logo -->
                <li class="logo-sn waves-effect py-3">
                    <div class="text-center">
                        <a href="/admin" class="pl-0">
                            <?= Html::img('/template/img/logo.jpg', ['style' => 'width: 4em']) ?>
                        </a>
                    </div>
                </li>

                <!-- Search Form -->
                <li>
                    <form class="search-form" role="search">
                        <div class="md-form mt-0 waves-light">
                            <input type="text" class="form-control py-2" placeholder="Search">
                        </div>
                    </form>
                </li>
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">

                        <li>
                            <a class="waves-effect" href="/admin">
                                <i class="w-fa fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-image"></i>Pages
                                <i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="/admin/pages/login.html" class="waves-effect">Login</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/register.html" class="waves-effect">Register</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/pricing.html" class="waves-effect">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/about.html" class="waves-effect">About us</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/single.html" class="waves-effect">Single post</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/post.html" class="waves-effect">Post listing</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/landing.html" class="waves-effect">Landing page</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/customers.html" class="waves-effect">Customers</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/invoice.html" class="waves-effect">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/page-creator.html" class="waves-effect">Page Creator</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/support.html" class="waves-effect">Support</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages/chat.html" class="waves-effect">Chat</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Simple link -->
                        <li><a href="/admin/menu" class="collapsible-header waves-effect"><i
                                        class="w-fa far fa-bell"></i>Menu</a></li>
                        <li><a href="/admin/category" class="collapsible-header waves-effect"><i
                                        class="w-fa far fa-bell"></i>Post Category</a></li>
                        <li><a href="/admin/posts" class="collapsible-header waves-effect"><i
                                        class="w-fa far fa-bell"></i>Posts</a></li>
                        <li><a href="/admin/destination" class="collapsible-header waves-effect"><i
                                        class="w-fa far fa-bell"></i>Destinations</a></li>
                        <li><a href="/admin/tours" class="collapsible-header waves-effect"><i
                                        class="w-fa far fa-bell"></i>Tours</a></li>
                        <li><a href="/admin/application" class="collapsible-header waves-effect"><i
                                        class="w-fa far fa-bell"></i>Applications <span class="badge badge-danger badge-pill"><?= \common\models\Applications::find()->count()?></span> </a></li>
                    </ul>
                </li>
                <!-- Side navigation links -->

            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!-- Sidebar navigation -->

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>

            <!-- Breadcrumb -->
            <div class="breadcrumb-dn mr-auto">
                <p>Dashboard v.1</p>
            </div>

            <div class="d-flex change-mode">

                <div class="ml-auto mb-0 mr-3 change-mode-wrapper">
                    <button class="btn btn-outline-black btn-sm" id="dark-mode">Change Mode</button>
                </div>

                <!-- Navbar links -->
                <ul class="nav navbar-nav nav-flex-icons ml-auto">

                    <!-- Dropdown -->
                    <li class="nav-item dropdown notifications-nav">
                        <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <span class="badge red">3</span> <i class="fas fa-bell"></i>
                            <span class="d-none d-md-inline-block">Notifications</span>
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">
                                <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                                <span>New order received</span>
                                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                                <span>New order received</span>
                                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                                <span>Your campaign is about to end</span>
                                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect"><i class="fas fa-envelope"></i> <span
                                    class="clearfix d-none d-sm-inline-block">Contact</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span
                                    class="clearfix d-none d-sm-inline-block">Support</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" id="logout">Log Out</a>
                            <a class="dropdown-item" href="#">My account</a>
                        </div>
                    </li>

                </ul>
                <!-- Navbar links -->

            </div>

        </nav>
        <!-- Navbar -->

        <!-- Fixed button -->
        <div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">

            <a class="btn-floating btn-lg red">
                <i class="fas fa-pencil-alt"></i>
            </a>

            <ul class="list-unstyled">
                <li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
                <li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
                <li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>

        </div>
        <!-- Fixed button -->

    </header>
    <!-- Main Navigation -->

    <!-- Main layout -->
    <main>

        <?= $content; ?>

    </main>
    <!-- Main layout -->

    <!-- Footer -->
    <footer class="page-footer rgba-stylish-light">

        <!-- Copyright -->
        <div class="footer-copyright py-3 text-center">
            <div class="container-fluid">
                © 2019 Copyright: <a href="https://osontur.uz" target="_blank">
                    osontur.uz </a>
            </div>
        </div>

    </footer>
    <!-- Footer -->

    <?php
    $logoutUrl = \yii\helpers\Url::toRoute(['/admin/auth/logout']);
    $js = <<<JS
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
            $("#logout").on('click', () => {
               $.ajax({
                    url: '$logoutUrl',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                      _csrf : csrfToken   
                    },
                    success: () => {
                        location.reload()
                    }
                });
            });
            $(".button-collapse").sideNav();
            var container = document.querySelector('.custom-scrollbar');
            var ps = new PerfectScrollbar(container, {
                wheelSpeed: 2,
                wheelPropagation: true,
                minScrollbarLength: 20
            });
        
            // Data Picker Initialization
            $('.datepicker').pickadate();
        
            // Material Select Initialization
            $(document).ready(function () {
                $('.mdb-select').material_select();
            });
        
            // Tooltips Initialization
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        // Small chart
    
        $(function () {
            $('#dark-mode').on('click', function (e) {
                e.preventDefault();
                $('h4, button').not('.check').toggleClass('dark-grey-text text-white');
                $('.list-panel a').toggleClass('dark-grey-text');
    
                $('footer, .card').toggleClass('dark-card-admin');
                $('body, .navbar').toggleClass('white-skin navy-blue-skin');
                $(this).toggleClass('white text-dark btn-outline-black');
                $('body').toggleClass('dark-bg-admin');
                $('h6, .card, p, td, th, i, li a, h4, input, label').not(
                    '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
                $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
                $('.gradient-card-header').toggleClass('white black lighten-4');
                $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');
    
            });
        });
JS;
    $this->registerJs($js, \yii\web\View::POS_READY);
    ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();

