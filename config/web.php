<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'timeZone' => 'Asia/Yekaterinburg',
    'components' => [
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD',  //GD or Imagick
        ],
        'request' => [
            'cookieValidationKey' => 'ahsd721yuhd7832hdujgh87gf23g8732fghjgf',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\LAdmins',
            'enableAutoLogin' => true,
            'loginUrl' => ['/admin/login'],
            'returnUrl' => ['/admin'],
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
            'suffix' => '/',
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['api' => 'api']
                ],
                'admin/actions/<action:\w+>'=>'admin/specials/<action>',
                'admin/actions'=>'admin/specials/index',
                'admin/articles/<action:\w+>'=>'admin/articles/<action>',
                'admin/articles'=>'admin/articles/index',
                'admin/feedback/<action:\w+>'=>'admin/feedback/<action>',
                'admin/feedback'=>'admin/feedback/index',
                'admin/productions/<action:\w+>'=>'admin/productions/<action>',
                'admin/productions'=>'admin/productions/index',
                'admin/banners/<action:\w+>'=>'admin/banners/<action>',
                'admin/banners'=>'admin/banners/index',
                'admin/<action:\w+>'=>'admin/default/<action>',
                'admin' => 'admin/default/index',
                '<action:\w+>'=>'site/<action>',
                '<action:\w+>/<id:\w+>'=>'site/<action>',
                '<action:\w+>/<name:\w+>'=>'site/<action>',
                ''=>'site/index',
            ],
        ],
    ],
    'modules'=> [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /*$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];*/

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
