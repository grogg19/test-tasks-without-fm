<?php
/**
 * Класс Route
 */

namespace App;

use App\Reflection\ReflectionArguments;
use ReflectionMethod;

/**
 * Class Route
 *
 * @package App
 */
class Route
{
    private $method;
    private $path;
    private $callback;

    /**
     * Route constructor.
     *
     * @param $method
     * @param $path
     * @param $callback
     */
    public function __construct($method, $path, $callback)
    {
        $this->method   = $method;
        $this->path     = $path;
        $this->callback = $callback;
    }

    /**
     * Метод в зависимости от типа возвращает либо результат статического метода, метода объекта, либо как результат функции
     *
     * @param $callback
     *
     * @return Renderable|string|null
     * @throws \ReflectionException
     */
    private function prepareCallback($callback)
    {
        if (is_string($callback)) { // Если значение $callback строка, разделяем ее по разделителю "@"
            // Если ссылка на стандартный метод
            if (str_contains($callback, '@')) {
                [$controller, $method] = explode('@', $callback);
                $parameters = (new ReflectionArguments($controller, $method))->getParameters();

                return (new ReflectionMethod($controller, $method))->invokeArgs(new $controller(), $parameters);
            }

            // Если ссылка на статический метод
            if (str_contains($callback, '::')) {
                [$controller, $method] = explode('::', $callback);

                return $controller::$method();
            }
        } elseif (is_object($callback)) { // Если значение $callback объект, то выводим значение методом __invoke()
            return $callback->__invoke();
        }

        return null;
    }

    /**
     * Метод возвращает uri маршрута
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Метод проверяет соответствие переданных параметров $method и $uri с параметрами маршрутов из массива объектов
     * маршрутов и при совпадении обоих возвращает true, и хотя бы при одном несовпадении возвращает false
     *
     * @param $method
     * @param $uri
     *
     * @return bool
     */
    public function match($method, $uri): bool
    {
        // Проверка совпадение метода
        if (is_array($this->method)) {
            if (!in_array($method, $this->method, true)) {
                return false;
            }
        } elseif ($method !== $this->method) {
            return false;
        }

        // Проверка совпадения URI
        if (!preg_match('/^' . str_replace(['*', '/'], ['[a-zA-Z0-9\-]+', '\/'], $this->getPath()) . '$/', explode('?', $uri)[0])) {
            return false;
        }

        return true;
    }

    /**
     * Метод запускает и возвращает результат работы $callback
     *
     * @return Renderable|string|null
     * @throws \ReflectionException
     */
    public function run()
    {
        return $this->prepareCallback($this->callback);
    }
}
