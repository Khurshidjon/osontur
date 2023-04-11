<?php

namespace frontend\controllers;

use common\models\Applications;
use common\models\Destinations;
use common\models\Pages;
use common\models\PostCategory;
use common\models\Posts;
use common\models\TelegramUser;
use common\models\Tours;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\captcha\Captcha;
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

    public function beforeAction($action)
    {
        if ($action->id == 'bot') {
            Yii::$app->request->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

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
        $destinations = $model->all();
        $toursModel = Tours::find();
        $tours = $toursModel->all();
        $wallpapers = $toursModel->where(['is_carousel' => 1])->all();
        $application = new Applications();
        if ($this->request->isPost) {
            if ($application->load($this->request->post())) {
                if ($application->save()) {
                    Yii::$app->session->setFlash('success', "User created successfully.");
                    $this->actionBooking($application);
                    return $this->response->redirect('/');
                }
            }
        }

        return $this->render('index', [
            'wallpapers' => $wallpapers,
            'destinations' => $destinations,
            'tours' => $tours,
            'application' => $application,
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
        if ($id) {
            $tours = $model->where(['destination_id' => $id])->all();
        } else {
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
        $application = new Applications();
        if ($this->request->isPost) {
            if ($application->load($this->request->post())) {
                if ($application->save(false)) {
                    Yii::$app->session->setFlash('success', "User created successfully.");
                    $this->actionBooking($application);
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }
        }
        return $this->render('pages/single-destination', [
            'tour' => $tour,
            'application' => $application
        ]);
    }

    public function actionPage($id)
    {
        $page = Pages::findOne($id);

        return $this->render('pages/page', [
            'page' => $page
        ]);
    }

    public function actionPosts()
    {
        $posts = Posts::find()->where(['status' => 1])->all();
        $postCategories = PostCategory::find()->where(['status' => 1])->all();
        return $this->render('pages/posts', [
            'posts' => $posts,
            'postCategories' => $postCategories,
        ]);
    }

    public function actionSinglePost()
    {
        return $this->render('pages/single-blog');
    }


    public function actionContacts()
    {
        $application = new Applications();
        if ($this->request->isPost) {
            if ($application->load($this->request->post())) {
                if ($application->save(false)) {
                    Yii::$app->session->setFlash('success', "User created successfully.");
                    $this->actionBooking($application);
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }
        }
        return $this->render('pages/contacts', [
            'application' => $application
        ]);
    }


    public function actionBooking($application)
    {
        $fio = $application->fio;
        $phone = $application->phone_number;
        $message = $application->message;
        $destination = $application->destination;

        $admins = TelegramUser::find()->where(['role' => 2])->all();
        $text = '';
        $text .= "<b>Yangi buyurtma</b>\n\n";
        $text .= "<b>FIO: </b>$fio\n";
        $text .= "<b>Tel: </b> +998$phone \n";

        if ($message) {
            $text .= "<b>Xabar: </b>$message \n";
        }

        if ($destination) {
            $text .= "<b>Yo'nalish: </b>$destination->title_uz \n";
        }

        $text .= "\n\n";

        $text .= "<b>Agar yuborilgan raqam telegramda mavjud bo'lsa unga yozish: </b>" . str_replace(" ", "", "https://t.me/+998" . $phone);

        foreach ($admins as $admin) {
            $chat_id = $admin->telegram_id;

            Yii::$app->telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $text,
                'parse_mode' => 'HTML'
            ]);
        }
    }

    public function actionBot()
    {
        $telegram = Yii::$app->telegram;
        $text = $telegram->input->message->text;
        $username = $telegram->input->message->chat->username;
        $telegram_id = $telegram->input->message->chat->id;
        $contact = $telegram->input->message->contact;
        $full_name = $telegram->input->message->chat->first_name . ' ' . $telegram->input->message->chat->last_name;
        $nsUser = TelegramUser::findOne(['telegram_id' => $telegram_id]);
        $destination_id = null;

        $change_btn = json_encode([
            'keyboard' => [
                [
                    ['text' => "🇺🇿 O'zbek"],
                ],
                [
                    ['text' => "🇷🇺 Русский"],
                ]
            ], 'resize_keyboard' => true
        ]);

        if (!$nsUser) {
            $newUser = new TelegramUser();
            $newUser->telegram_id = $telegram_id;
            $newUser->username = $username;
            $newUser->nickname = $full_name;
            $newUser->save(false);
            $telegram->sendMessage([
                'chat_id' => $telegram_id,
                'text' => "🇺🇿 Tilni tanlang \n\n 🇷🇺 Выберите язык",
                'reply_markup' => $change_btn,
            ]);
            die;
        }
        if ($text == "/start") {
            $nsUser->save(false);
            $telegram->sendMessage([
                'chat_id' => $telegram_id,
                'text' => "🇺🇿 Tilni tanlang \n\n 🇷🇺 Выберите язык",
                'reply_markup' => $change_btn
            ]);
            die;
        }
        if ($text == "🇺🇿 O'zbek") {
            $nsUser->language = 'uz';
            $nsUser->step = 2; //save lang
            $nsUser->save(false);
            $telegram->sendMessage([
                'chat_id' => $telegram_id,
                'text' => "Sayohat yo'nalishini tanlang",
                'reply_markup' => self::changeDestinationKeyboard('uz')
            ]);
            die;
        }
        if ($text == "🇷🇺 Русский") {
            $nsUser->language = 'ru';
            $nsUser->step = 2; //save lang
            $nsUser->save(false);
            $telegram->sendMessage([
                'chat_id' => $telegram_id,
                'text' => 'Выберите направление тура',
                'reply_markup' => self::changeDestinationKeyboard('ru')
            ]);
            die;
        }
        if ($nsUser->step == 2) {
            if ($nsUser->language == 'uz') {
                $field = 'title_uz';
                $contact_text = "Siz bilan bog'lanish uchun telefon raqamingizni operator kodi bilan yuboring";
            } else {
                $field = 'title_ru';
                $contact_text = "Отправьте номер телефона с кодом оператора, чтобы связаться с вами";
            }
            $destination = Destinations::find()->where(['like', $field, $text])->one();

            if ($destination) {
                $nsUser->temp_destination_id = $destination->id;
                $nsUser->step = 3;
                $nsUser->save(false);
                $telegram->sendMessage([
                    'chat_id' => $telegram_id,
                    'text' => $contact_text,
                    'reply_markup' => self::sharePhoneKeyboard($nsUser->language),
                ]);
                die();
            }
        }

        if ($nsUser->step == 3 && isset($contact)) {
            $nsUser->phone_number = $contact['phone_number'];
            $nsUser->step = 3; // save contact
            if ($nsUser->save(false)) {
                $app = new Applications();
                $app->fio = $nsUser->nickname;
                $app->phone_number = $nsUser->phone_number;
                $app->destination_id = $nsUser->temp_destination_id;
                $app->save(false);
                $telegram->sendMessage([
                    'chat_id' => $telegram_id,
                    'text' => self::lastMessage($nsUser->language, $app),
                    'reply_markup' => null
                ]);
                die;
            }
        }
    }

    public static function changeDestinationKeyboard($lang)
    {
        $destinations = Destinations::find()->where(['status' => 1])->all();
        $res = [];
        $data = [];
        foreach ($destinations as $destination) {
            $data['text'] = $destination->translateTg('title', $lang);
            $res[][] = $data;
        }

        $keyboard_share = json_encode([
            'keyboard' => $res,
            'resize_keyboard' => true,
        ]);
        return $keyboard_share;
    }


    public static function lastMessage($lang, $app)
    {
        $msg = "";
        $msg .= $lang == 'uz' ? "Arizangiz qabul qilindi, tez orada operatorlarimiz siz bilan bog'lanadi\n\nQo'shimcha ma'lumotlar bilan https://osontur.uz sahifasi orqali tanishishingiz mumkin" : "Ваша заявка принята, наши операторы свяжутся с вами в ближайшее время\n\nДополнительную информацию вы можете найти на https://osontur.uz/ru \n";
        if ($app){
            $fio = $app->fio;
            $phone = $app->phone_number;
            $msg .= "";
            if ($lang == 'ru'){
                $msg .= "<b>Ваш новый заказ</b> \n\n";
                $msg .= "<b>ФИО: </b>$fio\n";
                $msg .= "<b>Тел: </b> +998$phone \n";
                if ($app->destination != null){
                    $msg .= "<b>Направление: </b> $app->destination->translateTg('title', $lang) \n";
                }
            }else{
                $msg .= "<b>Yangi buyurtmangiz</b> \n\n";
                $msg .= "<b>FIO: </b>$fio\n";
                $msg .= "<b>Tel: </b> +998$phone \n";
                if ($app->destination != null){
                    $msg .= "<b>Yo'nalish: </b> $app->destination->translateTg('title', $lang) \n";
                }
            }
        }
        return $msg;
    }

    public static function sharePhoneKeyboard($lang)
    {
        $text_keybord_share_phone = $lang == 'uz' ? "📞 Telefon raqamni yuborish" : "📞 Отправить номер телефона";
        $keyboard_share = json_encode([
            'keyboard' => [
                [
                    [
                        'text' => $text_keybord_share_phone,
                        'request_contact' => true
                    ],
                ]
            ],
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
        ]);
        return $keyboard_share;
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
     * @return yii\web\Response
     * @throws BadRequestHttpException
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
