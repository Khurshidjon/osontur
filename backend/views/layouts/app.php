<?php

/** @var \yii\web\View $this */

/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Material Design Bootstrap</title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
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
                        <a href="#" class="pl-0"><img
                                    src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a>
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
                            <a class="waves-effect" href="/">
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
                                        <a href="../pages/login.html" class="waves-effect">Login</a>
                                    </li>
                                    <li>
                                        <a href="../pages/register.html" class="waves-effect">Register</a>
                                    </li>
                                    <li>
                                        <a href="../pages/pricing.html" class="waves-effect">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="../pages/about.html" class="waves-effect">About us</a>
                                    </li>
                                    <li>
                                        <a href="../pages/single.html" class="waves-effect">Single post</a>
                                    </li>
                                    <li>
                                        <a href="../pages/post.html" class="waves-effect">Post listing</a>
                                    </li>
                                    <li>
                                        <a href="../pages/landing.html" class="waves-effect">Landing page</a>
                                    </li>
                                    <li>
                                        <a href="../pages/customers.html" class="waves-effect">Customers</a>
                                    </li>
                                    <li>
                                        <a href="../pages/invoice.html" class="waves-effect">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="../pages/page-creator.html" class="waves-effect">Page Creator</a>
                                    </li>
                                    <li>
                                        <a href="../pages/support.html" class="waves-effect">Support</a>
                                    </li>
                                    <li>
                                        <a href="../pages/chat.html" class="waves-effect">Chat</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-user"></i>Profile<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="../profile/basic-1.html" class="waves-effect">Basic 1</a>
                                    </li>
                                    <li>
                                        <a href="../profile/basic-2.html" class="waves-effect">Basic 2</a>
                                    </li>
                                    <li>
                                        <a href="../profile/extended.html" class="waves-effect">Extended</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fab fa-css3"></i>CSS<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="../css/grid.html" class="waves-effect">Grid system</a>
                                    </li>
                                    <li>
                                        <a href="../css/media.html" class="waves-effect">Media object</a>
                                    </li>
                                    <li>
                                        <a href="../css/utilities.html" class="waves-effect">Utilities / helpers</a>
                                    </li>
                                    <li>
                                        <a href="../css/code.html" class="waves-effect">Code</a>
                                    </li>
                                    <li>
                                        <a href="../css/icons.html" class="waves-effect">Icons</a>
                                    </li>
                                    <li>
                                        <a href="../css/images.html" class="waves-effect">Images</a>
                                    </li>
                                    <li>
                                        <a href="../css/typography.html" class="waves-effect">Typography</a>
                                    </li>
                                    <li>
                                        <a href="../css/animations.html" class="waves-effect">Animations</a>
                                    </li>
                                    <li>
                                        <a href="../css/colors.html" class="waves-effect">Colors</a>
                                    </li>
                                    <li>
                                        <a href="../css/hover.html" class="waves-effect">Hover effects</a>
                                    </li>
                                    <li>
                                        <a href="../css/masks.html" class="waves-effect">Masks</a>
                                    </li>
                                    <li>
                                        <a href="../css/shadows.html" class="waves-effect">Shadows</a>
                                    </li>
                                    <li>
                                        <a href="../css/skins.html" class="waves-effect">Skins</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-th"></i>Components<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="../components/buttons.html" class="waves-effect">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="../components/cards.html" class="waves-effect">Cards</a>
                                    </li>
                                    <li>
                                        <a href="../components/collapse.html" class="waves-effect">Collapse</a>
                                    </li>
                                    <li>
                                        <a href="../components/date.html" class="waves-effect">Date picker</a>
                                    </li>
                                    <li>
                                        <a href="../components/list.html" class="waves-effect">List group</a>
                                    </li>
                                    <li>
                                        <a href="../components/panels.html" class="waves-effect">Panels</a>
                                    </li>
                                    <li>
                                        <a href="../components/pagination.html" class="waves-effect">Pagination</a>
                                    </li>
                                    <li>
                                        <a href="../components/popovers.html" class="waves-effect">Popovers</a>
                                    </li>
                                    <li>
                                        <a href="../components/progress.html" class="waves-effect">Progress bars</a>
                                    </li>
                                    <li>
                                        <a href="../components/stepper.html" class="waves-effect">Stepper</a>
                                    </li>
                                    <li>
                                        <a href="../components/tabs.html" class="waves-effect">Tabs & pills</a>
                                    </li>
                                    <li>
                                        <a href="../components/tags.html" class="waves-effect">Tags, labels & badges</a>
                                    </li>
                                    <li>
                                        <a href="../components/time.html" class="waves-effect">Time picker</a>
                                    </li>
                                    <li>
                                        <a href="../components/tooltips.html" class="waves-effect">Tooltips</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa far fa-check-square"></i>Forms<i
                                        class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="../forms/basic.html" class="waves-effect">Basic</a>
                                    </li>
                                    <li>
                                        <a href="../forms/extended.html" class="waves-effect">Extended</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-table"></i>Tables<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="../tables/basic.html" class="waves-effect">Basic</a>
                                    </li>
                                    <li>
                                        <a href="../tables/extended.html" class="waves-effect">Extended</a>
                                    </li>
                                    <li>
                                        <a href="../tables/datatables.html" class="waves-effect">DataTables.net</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-map"></i>Maps<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="../maps/google.html" class="waves-effect">Google Maps</a>
                                    </li>
                                    <li>
                                        <a href="../maps/full.html" class="waves-effect">Full screen map</a>
                                    </li>
                                    <li>
                                        <a href="../maps/vector.html" class="waves-effect">Vector world map</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Simple link -->
                        <li>
                            <a href="../alerts/alerts.html" class="collapsible-header waves-effect"><i
                                        class="w-fa far fa-bell"></i>Alerts</a>
                        </li>
                        <li>
                            <a href="../modals/modals.html" class="collapsible-header waves-effect"><i
                                        class="w-fa fas fa-bolt"></i>Modals</a>
                        </li>
                        <li>
                            <a href="../charts/charts.html" class="collapsible-header waves-effect"><i
                                        class="w-fa fas fa-chart-pie"></i>Charts</a>
                        </li>
                        <li>
                            <a href="../calendar/calendar.html" class="collapsible-header waves-effect"><i
                                        class="w-fa far fa-calendar-check"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="../sections/sections.html" class="collapsible-header waves-effect"><i
                                        class="w-fa fas fa-th-large"></i>Sections</a>
                        </li>

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
                            <a class="dropdown-item" href="#">Log Out</a>
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
                © 2019 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank">
                    MDBootstrap.com </a>
            </div>
        </div>

    </footer>
    <!-- Footer -->

    <?php
    $js = <<<JS
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

