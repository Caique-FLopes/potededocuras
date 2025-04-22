<?php
require_once '../db/Database.php';
class Vendas
{
    private string $table = 'venda';
    private Database $dbConn;
    private int $id;
    private int $id_usuario;
    private int $id_produto;
    private string $data_venda;

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
    public function update($where, $infos)
    {
        return $this->dbConn->update($where, $infos);
    }
}
