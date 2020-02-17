<?php

namespace App\Core\Request;

interface IRequest
{
    public function getUrlParameter($index = null);

    public function getPath();

    public function getHost();

    public function getScheme();

    public function getBody();

    public function isPost(): bool;

    public function getMethod();
}