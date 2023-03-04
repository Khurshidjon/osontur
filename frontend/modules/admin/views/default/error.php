<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

$this->title = $name;
?>
<style>
    .site-error{
        position: relative;
        top: 10rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .page-footer {
        position: absolute;
        width: 100%;
        bottom: 0;
    }
</style>
<div class="site-error">

    <h1><p><?= Html::encode($this->title) ?></p></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
