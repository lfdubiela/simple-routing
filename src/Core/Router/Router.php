<?php

namespace App\Core\Router;

use App\Core\Request\IRequest;
use App\Core\Request\Method;

class Router
{

    protected static $instance;

    protected $handlers = [];

    protected $request;

    /**
     * Router constructor.
     */
    protected function __construct()
    {}

    /**
     * Returns a singleton instance
     *
     * @return Router
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function get($path, $controller): Router
    {
        $action = $this->resolveAction($path);

        $path = $this->resolvePath($path);

        $this->handlers[$path][Method::GET] =
            [
                'action' => $action,
                'controller' => $controller
            ];

        return $this;
    }

    public function post($path, $controller): Router
    {
        $action = $this->resolveAction($path);

        $path = $this->resolvePath($path);

        $this->handlers[$path][Method::POST] =
            [
                'action' => $action,
                'controller' => $controller
            ];

        return $this;
    }

    public function resolve(IRequest $request)
    {
        if (!isset($this->handlers[$request->getPath()])) {
            $this->notFound();
            return;
        }

        if (!isset($this->handlers[$request->getPath()][$request->getMethod()])) {
            $this->methodNotAllowed();
            return;
        }

        $handler = $this->handlers[$request->getPath()][$request->getMethod()];

        $controller = new $handler['controller']();

        if (!method_exists($controller, $handler['action'])) {
            $this->methodNotAllowed();
            return;
        }

        return $controller->{$handler['action']}($request);
    }

    protected function resolveAction($path)
    {
        $explodeDoublePoint = array_filter(explode("::", $path));

        if (count($explodeDoublePoint) > 1) {
            return end($explodeDoublePoint);
        }

        $explodeSlash = array_filter(explode("/", $path));

        if (count($explodeSlash) > 1) {
            return end($explodeSlash);
        }

        return "index";
    }

    protected function resolvePath($path)
    {
        return explode("::", $path)[0];
    }

    private function methodNotAllowed()
    {
        header("HTTP/1.0 405 Method Not Allowed");
    }

    private function notFound()
    {
        header("HTTP/1.0 404 Not Found");
    }
}

