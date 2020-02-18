<?php

namespace App\Module\Pessoa\Controller;

use App\Core\Request\IRequest;
use App\Core\View\Render;
use App\Module\Pessoa\View\Form\FormCadastro;

use App\Module\Pessoa\Service\Pessoa as Service;

class Pessoa
{
    public function listar(IRequest $request)
    {
        print "<h1> Pessoas prontas para serem listadas </h1>";
    }

    public function cadastrar(IRequest $request)
    {
        $form = new FormCadastro();

        if ($request->isPost()) {
            $form->getForm()->hydrateValues($request->getBody());
            if ($form->getForm()->isValid()) {
                $pessoa = $form->getPessoa();

                $result = (new Service())->save($pessoa);

                $props['message'] = $result ? "Salvo com sucesso" : "Ocorreu um erro ao salvar pessoa";
            }
        }

        $props['form'] = $form;

        $render = new Render($props, __DIR__ . '/../View/form-cadastro.php');

        echo $render->render();
    }

    public function index()
    {
        print "<h1>Index routing</h1>";
    }
}
