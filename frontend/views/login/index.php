<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>

<div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto">

                <!-- Form with header -->
                <div class="card wow fadeIn" data-wow-delay="0.3s">
                    <div class="card-body">

                        <!-- Header -->
                        <div class="form-header purple-gradient">
                            <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Tizimga kirish</h3>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="md-form">
                            <i class="fas fa-envelope prefix white-text"></i>
                            <input type="text" name="LoginForm[username]" id="orangeForm-email" class="form-control" autofocus>
                            <label for="orangeForm-email">Username</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-lock prefix white-text"></i>
                            <input type="password" name="LoginForm[password]" id="orangeForm-pass" class="form-control">
                            <label for="orangeForm-pass">Password</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn purple-gradient btn-lg">Kirish</button>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <!-- Form with header -->

            </div>
        </div>
    </div>
</div>
