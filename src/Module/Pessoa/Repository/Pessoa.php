<?php

namespace App\Module\Pessoa\Repository;

use App\Module\Pessoa\Model\Pessoa as Model;

class Pessoa
{
    protected $conn;

    /**
     * Pessoa constructor.
     */
    public function __construct()
    {
        $serverName = "localhost:3306";
        $userName = "root";
        $password = "supersecret";
        $dbName = "adm";

        $this->conn = new \mysqli($serverName, $userName, $password, $dbName);

        if ($this->conn->connect_error) {
            throw new \Exception("Conneção com banco falhou: " + $this->conn->connect_error);
        }
    }

    public function insert(Model $pessoa): bool
    {
        return false;
    }

    public function update(Model $pessoa): bool
    {
        return false;
    }
}
