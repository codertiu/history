<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language'=>'ru',
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
       'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>[
                "<controller>/<action>/<id:\w+>" => '<controller>/<action>',
            ]
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    //'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    //'fileMap' => [
                      //  'main' => 'main.php',
                    //],
                ],
            ],
        ],
    ],

    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl'=>'http://my.history.uz',
                'basePath'=>'@frontend/web',
                'path' => 'files/global',
                'name' => 'Global'
            ],
            // 'watermark' => [
            //             'source'         => __DIR__.'/logo.png', // Path to Water mark image
            //              'marginRight'    => 5,          // Margin right pixel
            //              'marginBottom'   => 5,          // Margin bottom pixel
            //              'quality'        => 95,         // JPEG image save quality
            //              'transparency'   => 70,         // Water mark image transparency ( other than PNG )
            //              'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
            //              'targetMinPixel' => 200         // Target image minimum pixel size
            // ]
        ]
    ],
    'params' => $params,
];
