<?php

/**
 * Параметры подключения к БД
 */

return [
    'driver'   => 'mysql',
    'host'     => 'localhost_db',
    'username' => env('DB_USERNAME', 'db'),
    'password' => env('DB_PASSWORD', 'password'),
    'database' => env('DB_DATABASE', 'db'),
];