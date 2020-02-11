<?php

namespace App\Core;

include __DIR__.'/../Configuration/routes.php';

use App\Core\Request\Request;
use App\Core\Router\Router;

class Application {

    /**
     * Application constructor.
     * here goes a container?
     */
    public function __construct()
    {
        $this->handleRequest();
    }

    protected function handleRequest()
    {
        $request = Request::instance();
        Router::instance()->resolve($request);
    }
}