<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'language' => 'ru',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3ePwKlurC6fSzv0QM90bsrgsNTyfvLZ-',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                    [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/film/best' => '/film/best',
                '/film/countries' => '/film/countries',
                '/actors' => '/actor/index',
                'actors/page/<page:\d+>' => 'actor/index',
                '/actor/<url:\w+>' => 'actor/view',
                '/film/<url:\w+>'=>'film/view',
                '/' => 'film/index',
                '/page/<page:\d+>' => 'film/index',
                '/<url:filmy\w+>/page/<page:\d+>' => 'film/index',
                '/<url:filmy\w+>' => 'film/index',
                
                '/films/year/<year:\d+>' => 'film/index',
                '/films/year/<year:\d+>/page/<page:\d+>' => 'film/index',
                '/films/tag/<tag:\w+>/page/<page:\d+>' => 'film/index',
                '/films/tag/<tag:\w+>' => 'film/index',
                '/films/<country:\w+>/page/<page:\d+>' => 'film/index',
                '/films/<country:\w+>' => 'film/index',
                '/<genre:films\w+>/page/<page:\d+>' => 'film/index',
                '/<genre:films\w+>' => 'film/index',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
