<?php

use App\Config;

if (!function_exists('array_get')) {
    /**
     * Функция возращает значение из массива $array с ключом $key вида "key1.key2.***.value"
     *
     * @param array  $array
     * @param string $key
     * @param null   $default
     *
     * @return array|mixed|null
     */
    function array_get(array $array, string $key, $default = null)
    {
        //  Текущий уровень
        $currentLevel =& $array;
        //  Разбиваем $key по точке на массив
        $levels = explode('.', $key);

        // Ищем в массиве $levels ключ, совпадающий с ключом в массиве $currentLevel
        foreach ($levels as $levelKey) {
            // Если такой ключ есть и $currentLevel[$levelKey] является массивом
            if (array_key_exists($levelKey, $currentLevel) && is_array($currentLevel[$levelKey])) {
                // $currentLevel становится ссылкой на $currentLevel[$levelKey]
                $currentLevel =& $currentLevel[$levelKey];
            } else {
                // Иначе, возвращает значение $currentLevel[$levelKey] или значение по дефолту
                return ((empty($currentLevel[$levelKey])) ? $default : $currentLevel[$levelKey]);
            }
        }

        // возвращает значение $currentLevel или значение по дефолту
        return ((empty($currentLevel)) ? $default : $currentLevel);
    }
}

if (!function_exists('config')) {
    /**
     * @param $key
     * @param $default
     *
     * @return array|void
     */
    function config($key = null, $default = null)
    {
        if ($key === null) {
            return;
        }

        return Config::getInstance()->get($key, $default);
    }
}
