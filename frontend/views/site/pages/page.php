<?php
use yii\bootstrap5\Html;
/** @var \common\models\Pages $page*/
?>

<div class="bradcam_area bradcam_bg_3" style="background-image: url('/osonturPages<?= $page->image ?>')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3><?= $page->translate('title'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="about_story">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <?= $page->translate('content'); ?>
            </div>
        </div>
    </div>
</div>
