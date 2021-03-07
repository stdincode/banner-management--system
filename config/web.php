<?php

$secret = require __DIR__ . '/secret.php';
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$ipAddr = require __DIR__ . '/ipaddr.php';

$config = [
    'id' => 'basic',
    'name' => 'Banner Management System',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => $secret,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
            'loginUrl' => null,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
//            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
//                'modules/<controller:[\w-]+>' => 'api/<controller>',
//                'api/v1/resource/getbanner' => 'api/resource/actionBanner',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'modules/resource',
                    'pluralize' => false,
                ],
            ],
        ],
    ],
    'modules' => [
        'modules' => [
            'class' => 'app\modules\api',
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => $ipAddr,
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => $ipAddr,
    ];
}

return $config;
