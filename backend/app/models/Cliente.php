<?php
require_once '../db/Database.php';
class Cliente
{
    private string $table = 'cliente';
    private Database $dbConn;
    private string $id;
    private string $nome;
    private string $telefone;
    private array $compras;

    public function __construct()
    {
        $this->dbConn = new Database($this->table);
    }
    public function insert(array $infos)
    {
        return $this->dbConn->insert($infos);
    }
    public function buscarId(string $id)
    {
        return $this->dbConn->select(['id' => $id]);
    }
    public function listar()
    {
        return $this->dbConn->select();
    }
}
