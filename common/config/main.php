<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'dd.MM.Y',
            'datetimeFormat' => 'dd.MM.Y H:i:s',
            'timeFormat' => 'H:i:s',
//            'locale' => 'ru_RU',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
