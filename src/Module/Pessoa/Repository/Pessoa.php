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

    public function find(int $id): array
    {
        $result = [];

        $queryResult = $this->conn->query("
            select adm_cod as id, nivel, adm_nome as nome, adm_email as email, adm_matricula as matricula, cargo_cod as cargoId, adm_data_admissao as dataAdmissao
            from administrador
            where adm_cod = {$id}
        ");

        if ($queryResult->num_rows > 0) {
            $result = $queryResult->fetch_array();
        }

        $queryResult->free_result();

        return $result;
    }

    public function search(array $params): array
    {
        $results = [];

        $queryResult = $this->conn->query("
            select adm_cod as id, nivel, adm_nome as nome, adm_email as email, adm_matricula as matricula, cargo_cod as cargoId, adm_data_admissao as dataAdmissao
            from administrador
        ");

        if ($queryResult->num_rows > 0) {
            while ($row = $queryResult->fetch_array()) {
                $results[] = new Model(
                    $row['id'],
                    $row['nivel'],
                    $row['nome'],
                    $row['email'],
                    $row['matricula'],
                    $row['cargoId'],
                    $row['dataAdmissao']
                );
            }

            $queryResult->free_result();
        }

        return $results;
    }


    public function insert(Model $pessoa): bool
    {
        $this->conn->query("
            insert into administrador (nivel, adm_nome, adm_email, adm_matricula, cargo_cod, adm_data_admissao)
            values ('{$pessoa->getNivel()}', '{$pessoa->getNome()}', '{$pessoa->getEmail()}', '{$pessoa->getMatricula()}', {$pessoa->getCargoId()}, '{$pessoa->getDataAdmissao()}')             
        ");

        return $this->conn->affected_rows > 0;
    }

    public function excluir(int $id): bool
    {
        $this->conn->query("
             delete from administrador
             where adm_cod = {$id}         
        ");

        return $this->conn->affected_rows > 0;
    }

    public function update(Model $pessoa): bool
    {
        $sql = "
            update administrador 
                set 
                nivel = '{$pessoa->getNivel()}', 
                adm_nome = '{$pessoa->getNome()}', 
                adm_email = '{$pessoa->getEmail()}', 
                adm_matricula = '{$pessoa->getMatricula()}', 
                cargo_cod = {$pessoa->getCargoId()}, 
                adm_data_admissao = '{$pessoa->getDataAdmissao()}'
            where adm_cod = {$pessoa->getId()}         
        ";

        $this->conn->query($sql);

        return $this->conn->affected_rows > 0;
    }
}
