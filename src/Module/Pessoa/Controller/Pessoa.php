<?php

namespace App\Module\Pessoa\Controller;

use App\Core\Request\IRequest;
use App\Core\View\Render;
use App\Module\Pessoa\View\Form\FormCadastro;

class Pessoa {

    public static function listar(IRequest $request)
    {
        print "<h1> Pessoas prontas para serem listadas </h1>";
    }

    public static function cadastrar(IRequest $request)
    {
        $properties['form'] = new FormCadastro();
        $properties['action'] = '/pessoas/cadastrar';

        $render = new Render($properties, __DIR__.'/../View/form-cadastro.php');

        echo $render->render();
    }
}
