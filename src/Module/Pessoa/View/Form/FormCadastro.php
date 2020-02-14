<?php

namespace App\Module\Pessoa\View\Form;

use App\Core\View\Form\Form;

class FormCadastro
{
    protected $form;

    public function __construct()
    {
        $this->form = new Form("cadastro",
            [
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
                    'description' => 'Email:',
                    'id' => 'email',
                    'type' => Form::EMAIL,
                    'validators' => [
                        'required'
                    ]
                ]
            ]

        );
    }

    /**
     * @return Form
     */
    public function getName(): string
    {
        return $this->form->getName();
    }

    public function getFields(): array
    {
        return $this->form->getFields();
    }
}