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
}
