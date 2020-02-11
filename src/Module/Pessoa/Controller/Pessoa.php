<?php

namespace App\Module\Pessoa\Controller;

use App\Core\Request\IRequest;

class Pessoa {

    public static function listar(IRequest $request)
    {
        print "<h1> Pessoas prontas para serem listadas </h1>";
    }

    public static function cadastrar(IRequest $request)
    {
        print "<h1> Cadastrar Pessoas </h1>";
    }
}
