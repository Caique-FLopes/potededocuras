<?php
require_once '../db/Database.php';

class Produto
{
    private string $table = 'produto';
    private Database $dbConn;
    private string $id;
    private string $nome;
    private float $valor;
    private string $imagem;

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
