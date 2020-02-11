<?php

namespace App\Core\Request;

class Request implements IRequest
{
    protected $method;

    protected $url;

    protected static $instance;

    private function __construct()
    {
        $this->method = self::resolveMethod();
        $this->url = self::resolveUrl();
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getUrlParameter($index = null)
    {
        if (!$index && empty($_GET[$index])) {
             return $_GET[$index];
        }

        return null;
    }

    public function getPath()
    {
        return trim($this->url['path'], "/") ?? null;
    }

    public function getHost()
    {
        return $this->url['host'] ?? null;
    }

    public function getScheme()
    {
        return $this->url['scheme'] ?? null;
    }

    public function getBody()
    {
        return $this->resolveBody();
    }

    public function getMethod()
    {
        return $this->method;
    }

    protected function resolveUrl(): array
    {
        return parse_url($_SERVER['REQUEST_URI']);
    }

    protected function resolveBody()
    {
        $body = [];

        if ($this->getMethod() === Method::POST) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    protected static function resolveMethod()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return Method::POST;
        }

        return Method::GET;
    }
}
