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
            html,
            body,
            header,
            .view {
                height: 100%;
            }
            @media (min-width: 560px) and (max-width: 740px) {
                html,
                body,
                header,
                .view {
                    height: 650px;
                }
            }
            @media (min-width: 800px) and (max-width: 850px) {
                html,
                body,
                header,
                .view  {
                    height: 650px;
                }
            }
        </style>
    </head>

    <body class="login-page">

    <!-- Main Navigation -->
    <header>
        <!-- Intro Section -->
        <section class="view intro-2">
            <?= $content; ?>
        </section>
        <!-- Intro Section -->

    </header>
    <!-- Main Navigation -->

    <!-- Main layout -->
    <!--    <main>-->
    <!---->
    <!--        --><?//= $content; ?>
    <!---->
    <!--    </main>-->
    <!-- Main layout -->

    <?php
    $js = <<<JS
         new WOW().init();
JS;
    $this->registerJs($js, \yii\web\View::POS_READY);
    ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();

