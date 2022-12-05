<?php

use App\Application;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';

$router = require 'routes/web.php';

// создаем приложение
$application = new Application($router);

// Запуск приложения
$application->run();
