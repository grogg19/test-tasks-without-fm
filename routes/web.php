<?php

use App\Controllers\CustomerController;
use App\Exception\NotFoundException;
use App\Migrations\MigrationLoader;
use App\Router;

$router = new Router(); // создаем маршрутизатор

/** Запуск миграций  */
$router->get('get','/installdb', MigrationLoader::class . '@makeMigrations');

/** Главная страница */
$router->get('get','/', CustomerController::class . '@index');


/** Страница 404  */
$router->get('get','/404', NotFoundException::class . '@render');

return $router;