<?php

namespace App\Module\Pessoa\Model;

class Pessoa
{
    protected $id;

    protected $nivel;

    protected $nome;

    protected $email;

    protected $matricula;

    protected $cargoId;

    protected $dataAdmissao;

    /**
     * Pessoa constructor.
     * @param $id
     * @param $nivel
     * @param $nome
     * @param $email
     * @param $matricula
     * @param $cargo_id
     * @param $dataAdmissao
     */
    public function __construct($id, $nivel, $nome, $email, $matricula, $cargo_id, $dataAdmissao)
    {
        $this->id = $id;
        $this->nivel = $nivel;
        $this->nome = $nome;
        $this->email = $email;
        $this->matricula = $matricula;
        $this->cargoId = $cargo_id;
        $this->dataAdmissao = $dataAdmissao;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @return mixed
     */
    public function getCargoId()
    {
        return $this->cargoId;
    }

    /**
     * @return mixed
     */
    public function getDataAdmissao()
    {
        return $this->dataAdmissao;
    }
}
