<?php

namespace App\Module\Pessoa\View\Form;

use App\Core\Request\Method;
use App\Core\View\Form\Form;

class FormCadastro
{
    protected $form;

    public function __construct()
    {
        $this->form = new Form(
            "/pessoas/cadastrar",
            Method::POST,
            [
                [
                    'name' => 'nivel',
                    'description' => 'Nivel de Acesso:',
                    'type' => Form::SELECT,
                    'default' => 2,
                    'value' => [
                        1 => 'Usuário',
                        2 => 'Administrador'
                    ]
                ],
                [
                    'name' => 'nome',
                    'description' => 'Nome*:',
                    'id' => 'nome',
                    'type' => Form::TEXT,
                    'validators' => [
                        'required'
                    ],
                ],
                [
                    'name' => 'email',
                    'description' => 'E-mail:',
                    'id' => 'email',
                    'type' => Form::EMAIL,
                    'validators' => [
                        'required'
                    ]
                ],
                [
                    'name' => 'bloquear_envio_email',
                    'description' => 'Bloquear envio de e-mail para esta pessoa.',
                    'id' => 'bloquear_envio_email',
                    'type' => Form::CHECKBOX,
                ],
                [
                    'name' => 'matricula',
                    'description' => 'Matricula:',
                    'type' => Form::TEXT,
                ],
                [
                    'name' => 'admissao_data',
                    'description' => 'Data de Admissão:',
                    'type' => Form::DATE,
                ],
                [
                    'name' => 'exige_qualificacao',
                    'description' => 'Exige Qualificação:',
                    'type' => Form::RADIO,
                    'value' => [
                        'Sim' => 'Sim',
                        'Não' => 'Não'
                    ]
                ],
                [
                    'name' => 'unidade',
                    'description' => 'Unidade:',
                    'type' => Form::SELECT,
                    'value' => [
                        1 => 'Matriz',
                        2 => 'Sede 02'
                    ]
                ],
                [
                    'name' => 'cargo',
                    'description' => 'Cargo Principal:',
                    'type' => Form::SELECT,
                    'value' => [
                        1 => 'Chefe',
                        2 => 'Funcionário'
                    ]
                ],
                [
                    'name' => 'cargo_1',
                    'description' => 'Cargo Principal:',
                    'type' => Form::SELECT,
                    'value' => [
                        1 => 'Chefe',
                        2 => 'Funcionário'
                    ]
                ],
                [
                    'name' => 'cargo_2',
                    'description' => 'Cargo Secundario:',
                    'type' => Form::SELECT,
                    'value' => [
                        1 => 'Chefe',
                        2 => 'Funcionário'
                    ]
                ],
                [
                    'name' => 'setor',
                    'description' => 'Setor:',
                    'type' => Form::SELECT,
                    'value' => [
                        1 => 'Administrativo',
                        2 => 'Chão de fábrica'
                    ]
                ],
                [
                    'name' => 'turno',
                    'description' => 'Turno:',
                    'type' => Form::SELECT,
                    'value' => [
                        1 => 'Noturno',
                        2 => 'Diurno'
                    ]
                ],
                [
                    'name' => 'carga_horaria',
                    'description' => 'Carga Horária:',
                    'type' => Form::NUMBER,
                ],
                [
                    'name' => 'login',
                    'description' => 'Login:',
                    'type' => Form::TEXT,
                ],
                [
                    'name' => 'senha',
                    'description' => 'Senha:',
                    'type' => Form::TEXT,
                ],
                [
                    'name' => 'confirmar_senha',
                    'description' => 'Confirmar Senhar*:',
                    'type' => Form::TEXT,
                ],
                [
                    'name' => 'senha_expiracao',
                    'description' => 'Expiração Senha em*:',
                    'type' => Form::NUMBER,
                    'extraInfo' => 'dias (após vencimento do periodo, a senha expira a sua alteração é obrigatoria)'
                ],
                [
                    'name' => 'cadastrar',
                    'description' => 'cadastrar',
                    'type' => Form::SUBMIT,
                ]
            ]
        );
    }

    /**
     * @return Form
     */
    public function getForm(): Form
    {
        return $this->form;
    }
}