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

    public function buscarComQuantidadesPorCliente($clienteId)
    {
        $hoje = date('Y-m-d');
        $sql = "
        SELECT 
            p.*, 
            COALESCE(v.total_quantidade, 0) as quantidade
        FROM produto p
        LEFT JOIN (
            SELECT 
                id_produto, 
                SUM(quantidade) as total_quantidade
            FROM venda
            WHERE id_cliente = :clienteId AND DATE(data_venda) = :hoje
            GROUP BY id_produto
        ) v ON p.id = v.id_produto
    ";

        $stmt = $this->dbConn->connect()->prepare($sql);
        $stmt->bindParam(':clienteId', $clienteId);
        $stmt->bindParam(':hoje', $hoje);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
