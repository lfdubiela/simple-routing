<?php

namespace App\Module\Pessoa\Service;

use App\Module\Pessoa\Model\Pessoa as Model;
use App\Module\Pessoa\Repository\Pessoa as Repository;

class Pessoa
{
    protected $repository;

    /**
     * Pessoa constructor.
     */
    public function __construct()
    {
        $this->repository = new Repository();
    }

    public function save(Model $pessoa)
    {
        if ($pessoa->getId()) {
            return $this->repository->update($pessoa);
        }

        return $this->repository->insert($pessoa);
    }

    /**
     * @param array $params
     * @return array
     */
    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $params
     * @return array
     */
    public function search(array $params)
    {
        return $this->repository->search($params);
    }

    public function excluir(int $id)
    {
        return $this->repository->excluir($id);
    }
}
