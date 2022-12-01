<?php
/**
 * Параметры подключения к БД
 */
return [
    'driver' => 'mysql',
    'host' => env('HOST_NAME', 'localhost'),
    'username' => env('MYSQL_USER', 'db'),
    'password' => env('MYSQL_PASSWORD', 'password'),
    'database' => env('MYSQL_DATABASE', 'db')
];