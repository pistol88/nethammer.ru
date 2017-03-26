<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'sourceLanguage' => 'ru',
    'language' => 'ru-RU',
	'timeZone' => 'Etc/GMT-5',
    'components' => [
        'assetManager' => [
            //'forceCopy' => true,
        ],
        'settings' => [
            'class' => 'pheme\settings\components\Settings'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
    ],
    'modules' => [
        'settings' => [
            'class' => 'pheme\settings\Module',
            'sourceLanguage' => 'ru',
            'accessRoles' => ['admin']
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\RbacWebModule',
            'admins' => ['pistol'],
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['pistol'],
        ],
        'gallery' => [
            'class' => 'pistol88\gallery\Module',
            'imagesStorePath' => dirname(dirname(__DIR__)).'/frontend/web/images/store', //path to origin images
            'imagesCachePath' => dirname(dirname(__DIR__)).'/frontend/web/images/cache', //path to resized copies
            'graphicsLibrary' => 'GD',
            'placeHolderPath' => '@webroot/images/placeHolder.png',
        ],
    ],
];
