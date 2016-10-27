<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=blogyii2',
    'username' => 'pruebas',
    'password' => '123456',
    'charset' => 'utf8',
	'on afterOper'	=> function($event) {
		$event->sender->creteCommand("SET time_zone = '-5:00'")->execute();
	}
];
