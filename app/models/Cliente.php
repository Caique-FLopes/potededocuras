<?php
require_once '../db/Database.php';

class Cliente
{
    private string $table = 'cliente';
    private string $id;
    private string $nome;
    private string $telefone;
    private array $compras;

    public function insert(array $infos)
    {
        $dbConn = new Database($this->table);
        return $dbConn->insert($infos);
    }
}
