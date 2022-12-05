<?php

use App\Controllers\AdditionBigNumbersController;
use App\Controllers\CustomerController;
use App\Exception\NotFoundException;
use App\Migrations\MigrationLoader;
use App\Router;

$router = new Router(); // создаем маршрутизатор

/** Запуск миграций  */
$router->get('get', '/installdb', MigrationLoader::class . '@makeMigrations');

/** Задача №1 */
$router->get('get', '/', CustomerController::class . '@index');

/** Задача №2 */
$router->get('get', '/second-task', AdditionBigNumbersController::class . '@index');

/** Страница 404  */
$router->get('get', '/404', NotFoundException::class . '@render');

return $router;