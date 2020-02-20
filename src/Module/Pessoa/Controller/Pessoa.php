<?php

namespace App\Module\Pessoa\Controller;

use App\Core\Request\IRequest;
use App\Core\View\Render;
use App\Module\Pessoa\View\Form\FormCadastro;

use App\Module\Pessoa\Service\Pessoa as Service;

class Pessoa
{
    public function listar()
    {
        $pessoas = (new Service())->search([]);

        $props = ['pessoas' => $pessoas];
        $render = new Render($props, __DIR__ . '/../View/lista.php');
        echo $render->render();
    }

    public function cadastrar(IRequest $request)
    {
        $id = $request->getUrlParameter('id');

        $form = new FormCadastro();

        if ($id) {
            $result = (new Service())->find((int)$id);
            $form->getForm()->hydrateValues($result);
        }

        if ($request->isPost()) {
            $form->getForm()->hydrateValues($request->getBody());
            if ($form->getForm()->isValid()) {
                $pessoa = $form->getPessoa();
                $result = (new Service())->save($pessoa);
                $this->redirectUrl("/pessoas");
            }
        }

        $props['form'] = $form;
        $render = new Render($props, __DIR__ . '/../View/form-cadastro.php');
        echo $render->render();
    }

    public function excluir(IRequest $request)
    {
        $id = $request->getUrlParameter('id');

        if ($id) {
            (new Service())->excluir((int) $id);
        }

        $this->redirectUrl("/pessoas");
    }

    public function index()
    {
        print "<h1>Index routing</h1>";
    }

    /**
     * @param bool $pedidoCriado
     * @return array
     */
    public function criarMensagemPedidoSalvo(bool $pedidoCriado)
    {
        return $pedidoCriado ? [
            "error" => false,
            "message" => "Cadastro salvo com sucesso"
        ] : [
            "error" => true,
            "message" => "Ocorreu um erro ao salvar cadastro"
        ];
    }

    /**
     * @param string $url
     */
    protected function redirectUrl(string $url)
    {
        header("Location: {$url}");
    }
}
