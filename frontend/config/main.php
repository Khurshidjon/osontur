<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['multiLanguage'],
    'controllerNamespace' => 'frontend\controllers',
    'layout' => 'app',
    'modules' => [
        'admin' => [
            'class' => 'frontend\modules\admin\Module',
        ],
    ],
    'language' => 'uz',
    'components' => [
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '6264790283:AAGFeIBdwHato4ByvjDi0AdNB5nAflLOQJM',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        "request" => [
            "class" => \skeeks\yii2\multiLanguage\MultiLangRequest::class
        ],

        "urlManager" => [
            "class" => \skeeks\yii2\multiLanguage\MultiLangUrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'about' => 'site/about',
                'tours' => 'site/tours',
                'tours-list' => 'site/tours-list',
                'posts' => 'site/blog',
            ],
        ],

        "multiLanguage" => [
            "class" => \skeeks\yii2\multiLanguage\MultiLangComponent::class,
            'langs' => ['uz', 'ru', 'en'],
            'default_lang' => 'uz',         //Language to which no language settings are added.
            'lang_param_name' => 'lang',
        ]

    ],
    'params' => $params,
];
