<?php

namespace App\Module\Pessoa\View\Form;

use App\Core\Request\Method;
use App\Core\View\Form\Form;
use App\Module\Pessoa\Model\Pessoa;

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
                    'name' => 'id',
                    'type' => Form::HIDDEN,
                ],
                [
                    'name' => 'nivel',
                    'description' => 'Nivel de Acesso',
                    'type' => Form::SELECT,
                    'value' => 'Usuario',
                    'options' => [
                        'Usuário' => 'Usuario',
                        'Cadastro Simples' => 'Simples'
                    ],
                    'validators' => [
                        'required'
                    ]
                ],
                [
                    'name' => 'nome',
                    'description' => 'Nome*',
                    'id' => 'nome',
                    'type' => Form::TEXT,
                    'validators' => [
                        'required'
                    ],
                ],
                [
                    'name' => 'email',
                    'description' => 'E-mail',
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
                    'description' => 'Matricula',
                    'type' => Form::TEXT,
                    'validators' => [
                        'required'
                    ]
                ],
                [
                    'name' => 'admissao_data',
                    'description' => 'Data de Admissão',
                    'type' => Form::DATE,
                    'validators' => [
                        'required'
                    ]
                ],
                [
                    'name' => 'exige_qualificacao',
                    'description' => 'Exige Qualificação',
                    'type' => Form::RADIO,
                    'value' => 1,
                    'options' => [
                        'Sim' => 1,
                        'Não' => 0
                    ]
                ],
                [
                    'name' => 'unidade',
                    'description' => 'Unidade',
                    'type' => Form::SELECT,
                    'options' => [
                        'Matriz' => 1,
                        'Sede 02' => 2,
                    ]
                ],
                [
                    'name' => 'cargo',
                    'description' => 'Cargo Principal',
                    'type' => Form::SELECT,
                    'options' => [
                        'Chefe' => 1,
                        'Funcionário' => 2
                    ],
                    'validators' => [
                        'required'
                    ]
                ],
                [
                    'name' => 'cargo_1',
                    'description' => 'Cargo Principal',
                    'type' => Form::SELECT,
                    'options' => [
                        'Chefe' => 1,
                        'Funcionário' => 2
                    ]
                ],
                [
                    'name' => 'cargo_2',
                    'description' => 'Cargo Secundario',
                    'type' => Form::SELECT,
                    'options' => [
                        'Chefe' => 1,
                        'Funcionário' => 2
                    ]
                ],
                [
                    'name' => 'setor',
                    'description' => 'Setor',
                    'type' => Form::SELECT,
                    'options' => [
                        'Administrativo' => 1,
                        'Chão de fabrica' => 2
                    ]
                ],
                [
                    'name' => 'turno',
                    'description' => 'Turno',
                    'type' => Form::SELECT,
                    'options' => [
                        'Noturno' => 1,
                        'Diurno' => 2
                    ]
                ],
                [
                    'name' => 'carga_horaria',
                    'description' => 'Carga Horária',
                    'type' => Form::NUMBER,
                ],
                [
                    'name' => 'login',
                    'description' => 'Login',
                    'type' => Form::TEXT,
                ],
                [
                    'name' => 'senha',
                    'description' => 'Senha',
                    'type' => Form::TEXT,
                ],
                [
                    'name' => 'confirmar_senha',
                    'description' => 'Confirmar Senhar*',
                    'type' => Form::TEXT,
                ],
                [
                    'name' => 'senha_expiracao',
                    'description' => 'Expiração Senha em*',
                    'type' => Form::NUMBER,
                    'value' => 180,
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

    public function getPessoa(): Pessoa
    {
        return new Pessoa(
            $this->form->getFieldValue('id'),
            $this->form->getFieldValue('nivel'),
            $this->form->getFieldValue('nome'),
            $this->form->getFieldValue('email'),
            $this->form->getFieldValue('matricula'),
            $this->form->getFieldValue('cargo'),
            $this->form->getFieldValue('admissao_data')
        );
    }
}