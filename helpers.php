<?php

use Illuminate\Support\Env;
use App\Config;

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        return Env::get($key, $default);
    }
}

if (! function_exists('array_get')) {
    /**
     * Функция возращает значение из массива $array с ключом $key вида "key1.key2.***.value"
     * @param array $array
     * @param string $key
     * @param null $default
     * @return array|mixed|null
     */
    function array_get(array $array, string $key, $default = null )
    {
        //  Текущий уровень
        $currentLevel =& $array;
        //  Разбиваем $key по точке на массив
        $levels = explode('.', $key);

        // Ищем в массиве $levels ключ, совпадающий с ключом в массиве $currentLevel
        foreach ($levels as $keyLevel) {
            // Если такой ключ есть и $currentLevel[$keyLevel] является массивом
            if (array_key_exists($key, $currentLevel) && is_array($currentLevel[$keyLevel])) {
                // $currentLevel становится ссылкой на $currentLevel[$keyLevel]
                $currentLevel =& $currentLevel[$keyLevel];
            } else {
                // Иначе, возвращает значение $currentLevel[$keyLevel] или значение по дефолту
                return ((empty($currentLevel[$keyLevel])) ? $default : $currentLevel[$keyLevel]);
            }
        }
        // возвращает значение $currentLevel или значение по дефолту
        return ((empty($currentLevel)) ? $default : $currentLevel);
    }
}

if (! function_exists('config')) {
    /**
     * @param $key
     * @param $default
     *
     * @return array|void
     */
    function config($key = null, $default = null) {

        if ($key === null) {
            return ;
        }

        return Config::getInstance()->get($key, $default);
    }

}
