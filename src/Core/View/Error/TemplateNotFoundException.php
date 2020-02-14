<?php

namespace App\Core\View\Error;

use Throwable;

class TemplateNotFoundException extends \RuntimeException
{
    public function __construct($fileName = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Template {$fileName} nao encontrado! ", $code, $previous);
    }
}