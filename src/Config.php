<?php

namespace App;

/**
 * Класс Конфигураций Config
 */
final class Config
{
    /**
     * @var Config
     */
    private static $instance;

    /**
     * @var array
     */
    private array $configs = [];

    /**
     * Config constructor.
     */
    private function __construct()
    {
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/config/';

        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file !== '.' && $file !== '..') {
                    $filename = explode('.',$file);
                    if (file_exists($dir . $file) && $filename[1] = "php")
                    {
                        $this->configs[$filename[0]] = require $dir . $file;
                    }
                }
            }
        }
    }

    /**
     * @return Config
     */
    public static function getInstance(): Config
    {
        if (null === self::$instance) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * @param $key
     * @param array $default
     * @return array
     */
    public function getConfig($key, array $default = []): array
    {
        return $this->configs[$key] ?? $default;
    }

    /**
     * @param $key
     * @param $value
     * @return Config
     */
    public function setConfig($key, $value): Config
    {
        $this->configs[$key] = $value;
        return $this;
    }

    /**
     * @param $config
     * @param null $default
     */
    public function get($config, $default = null)
    {
        return array_get($this->configs, $config, $default);
    }
}
