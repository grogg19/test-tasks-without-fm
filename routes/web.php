<?php

use App\Controllers\FirstTaskController;
use App\Controllers\SecondTaskController;
use App\Controllers\ThirdTaskController;
use App\Exception\NotFoundException;
use App\Migrations\MigrationLoader;
use App\Router;

$router = new Router(); // создаем маршрутизатор

/** Запуск миграций  */
$router->get('get', '/installdb', MigrationLoader::class . '@makeMigrations');

/** Задача №1 */
$router->get('get', '/', FirstTaskController::class . '@index');

/** Задача №1 */
$router->get('get', '/customers/', FirstTaskController::class . '@index');

/** Задача №2 */
$router->get('get', '/second-task', SecondTaskController::class . '@index');

/** Задача №3 */
$router->get('get', '/third-task', ThirdTaskController::class . '@index');

/** Страница 404  */
$router->get('get', '/404', NotFoundException::class . '@render');

return $router;