<?php

namespace frontend\controllers;

use common\models\LoginForm;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `admin` module
 */
class LoginController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $layout = '//adminAuth';

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin']);
        }

        $model->password = '';

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
