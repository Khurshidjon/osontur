<?php

namespace frontend\controllers;

use common\models\Destinations;
use common\models\TelegramUser;
use common\models\Tours;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Destinations::find();
        $wallpapers = $model->where(['is_banner' => 1])->all();
        $destinations = $model->all();

        $tours = Tours::find()->all();
        return $this->render('index', [
            'wallpapers' => $wallpapers,
            'destinations' => $destinations,
            'tours' => $tours,
        ]);
    }


    public function actionAbout()
    {
        return $this->render('pages/about');
    }


    public function actionToursList($id = null)
    {
        $destination = Destinations::findOne($id);
        $model = Tours::find();
        if ($id){
            $tours = $model->where(['destination_id' => $id])->all();
        }else{
            $tours = $model->all();
        }
        return $this->render('pages/destinations', [
            'tours' => $tours,
            'destination' => $destination,
        ]);
    }

    public function actionSingleDestination($id = null)
    {
        $tour = Tours::findOne($id);
        return $this->render('pages/single-destination', [
            'tour' => $tour
        ]);
    }

    public function actionBlog()
    {
        return $this->render('pages/blog');
    }

    public function actionSingleBlog()
    {
        return $this->render('pages/single-blog');
    }

    public function actionBooking()
    {
        $chat_id = '631141690';
        $text = '';
        $text .= "<b>Yangi buyurtma</b>\n\n";
        $text .= "<b>FIO: </b> Ergashev Xurshid Ergash o'g'li \n";
        $text .= "<b>Tel: </b> +998990005795 \n";
        $text .= "\n\n";
        $text .= "<b>Agar yuborilgan raqam telegramda mavjuda bo'lsa unga yozish: </b> https://t.me/+998990005795";

        Yii::$app->telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'HTML'
        ]);
    }

    public function actionBot()
    {
        $telegram = Yii::$app->telegram;
        $text = $telegram->input->message->text;
        $username = $telegram->input->message->chat->username;
        $first_name = $telegram->input->message->chat->first_name;
        $telegram_id = $telegram->input->message->chat->id;
        $user = TelegramUser::find()->where(['telegram_id' => $telegram_id])->one();
        $message_id = $telegram->input->message->message_id;
//        $telegram_response = Yii::$app->telegram_response;

        $msg = $telegram->update->callback_query;
        if (!$user) {
            $model = new TelegramUser();
            $model->telegram_id = $telegram_id;
            $model->username = $username;
            $model->first_name = $first_name;
            $model->save(false);
        }
        if ($text == "/start") {
            $telegram->sendMessage([
                'chat_id' => $telegram_id,
                'text' => "Assalomu alaykum ". $first_name,
            ]);
        }
//        $query_id = $telegram->input->callback_query->id;
//        $telegram->sendMessage([
//            'chat_id' => 631141690,
//            'text' => $query_id,
//        ]);
//        Yii::$app->telegram->answerCallbackQuery([
//            'callback_query_id' => $query_id, //require
//            'text' => 'text', //Optional
//            'show_alert' => 'my alert',  //Optional
////           'cache_time' => 123231,  //Optional
//        ]);
    }



























    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
