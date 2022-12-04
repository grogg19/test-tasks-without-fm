<?php

namespace App;

/**
 * Class Url
 * @package App
 */
class Url
{
    /**
     * @var string
     */
    private $url;

    /**
     * Url constructor.
     */
    public function __construct()
    {
        $this->url = explode('?', ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'])[0];
    }

    /**
     * Возвращает текущий url
     * @return string
     */
    public function url(): string
    {
        return $this->url . $_SERVER['REQUEST_URI'];
    }

    /**
     * Возвращает текщий адрес сайта
     * @return string
     */
    public function baseUrl(): string
    {
        return $this->url;
    }

    /**
     * Возвращает адрес предыдущей страницы
     * @return string
     */
    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }
}
