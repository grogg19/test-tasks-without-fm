<?php

namespace App;

use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Application
 *
 * @package App
 */
class Application
{
    private Router $router; // Маршрутизатор

    /**
     * Application constructor.
     *
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    /**
     * Метод проверяет результат метода dispatch.
     * Если передан объект-потомок Renderable, то он выводится методом render(),
     * иначе выводим результат с помощью echo
     */
    public function run()
    {
        try {
            $result = $this->router->dispatch();
            // проверяем, является ли экземпляр потомком Renderable
            if (is_object($result) && $result instanceof Renderable) {
                // Если да, то выводим его методом render()
                echo $result->render();
            } else {
                // Если нет, то просто выводим с помощью echo
                echo $result;
            }
        } catch (Exception $e) {
            // при возникновении исключения запускаем метод renderException()
            $this->renderException($e);
        }
    }

    /**
     * При возникновении исключения метод, выводит шаблон исключения
     *
     * @param $e
     */
    public function renderException($e)
    {
        if ($e->getCode() === '42S02') {
            Redirect::to('/installdb');
            exit();
        }
        // Если экземпляр Renderable
        if ($e instanceof Renderable) {
            // то запускаем его метод render()
            $e->render();
        } else {
            // Иначе выводим сообщение исключения
            echo $e->getMessage();
        }
    }

    /**
     * Подключение к БД
     */
    public function initialize()
    {
        // Создаем экземпляр
        $capsule = new Capsule();

        // Добавляем подключение к БД
        $capsule->addConnection([
            'driver'    => config('database.driver'),
            'host'      => config('database.host'),
            'database'  => config('database.database'),
            'username'  => config('database.username'),
            'password'  => config('database.password'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}
