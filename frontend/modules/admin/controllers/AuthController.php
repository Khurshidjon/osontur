<?php

namespace frontend\modules\admin\controllers;

use common\models\LoginForm;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `admin` module
 */
class AuthController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $layout = false;

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionLogout()
    {
        if (Yii::$app->request->isPost){
            Yii::$app->user->logout();
            return true;
        }
    }
}
