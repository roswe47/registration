 <?php

use yii\authclient\Collection;

$params = require __DIR__ . '/params.php';

$db = require __DIR__ . '/db.php';

$config = [
     'id' => 'basic',
     "name" => "Name_site",
     'basePath' => dirname(__DIR__),
     'bootstrap' => ['log'],
     'language' => 'ru-RU',
     'aliases' => [
     '@bower' => '@vendor/bower-asset',
     '@npm'   => '@vendor/npm-asset',
     
    ],
    'components' => [
. . . 


    'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'my_email',
                'password' => 'my_password',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],

. . . 

 'params' => $params,
];

return $config;
