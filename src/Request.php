<?php

namespace App;

/**
 * Class Request
 *
 * @package App
 */
class Request
{
    /**
     * @var array
     */
    private array $get;

    /**
     * @var array
     */
    private array $post;

    /**
     * @var array
     */
    private array $request;

    /**
     * @var array
     */
    private array $cookie;

    /**
     * @var array
     */
    private array $files;

    /**
     * @var array
     */
    private array $server;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get     = $_GET;
        $this->post    = $_POST;
        $this->request = $_REQUEST;
        $this->cookie  = $_COOKIE;
        $this->files   = $_FILES;
        $this->server  = $_SERVER;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->request;
    }

    /**
     * @param string $key
     *
     * @return string|array
     */
    public function cookie(string $key = '')
    {
        if (!empty($key) && is_string($key)) {
            return $this->cookie[$key];
        }

        return $this->cookie;
    }

    /**
     * @param string $key
     *
     * @return array|string|null
     */
    public function get(string $key = '')
    {
        if (!empty($key) && is_string($key)) {
            return $this->get[$key] ?? null;
        }

        return $this->get;
    }

    /**
     * @param string $key
     *
     * @return array|string|null
     */
    public function post(string $key = '')
    {
        if (!empty($key) && is_string($key)) {
            return $this->post[$key] ?? null;
        }

        return $this->post;
    }

    /**
     * @return array
     */
    public function files($key = '')
    {
        if (!empty($key) && is_string($key)) {
            return $this->files[$key] ?? null;
        }

        return $this->files;
    }

    /**
     * @param string $key
     *
     * @return array|string
     */
    public function server(string $key = '')
    {
        if (!empty($key) && is_string($key)) {
            return $this->server[$key];
        }

        return $this->server;
    }
}
