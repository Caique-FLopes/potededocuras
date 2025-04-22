<?php

class Database
{
    private string $host;
    private string $dbname;
    private string $user;
    private string $pass;
    private string $table;
    private PDO $conn;

    public function __construct(string $table)
    {
        $config = require __DIR__ . '/../../config/.env.php';

        $this->table = $table;
        $this->host = $config['DB_HOST'];
        $this->dbname = $config['DB_NAME'];
        $this->user = $config['DB_USER'];
        $this->pass = $config['DB_PASS'];
    }

    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
        return $this->conn = new PDO($dsn, $this->user, $this->pass);
    }

    public function insert(array $infos): bool
    {
        $columns = array_keys($infos);
        $placeholders = array_map(fn($col) => ":$col", $columns);

        $sql = "INSERT INTO {$this->table} (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($infos);
    }

    public function select(array $regras = null, string $colunas = "*")
    {
        $sql = "SELECT {$colunas} FROM {$this->table}";
        $params = [];

        if (!empty($regras)) {
            $condicoes = [];

            foreach ($regras as $coluna => $valor) {
                $condicoes[] = "{$coluna} = :{$coluna}";
                $params[$coluna] = $valor;
            }

            $sql .= " WHERE " . implode(' AND ', $condicoes);
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function update($where, array $values)
    {
        $colunas = array_keys($values);
        $valores = array_values($values);

        $sql = "UPDATE " . $this->table . " SET " . implode('=?,', $colunas) . '=? WHERE ' . $where;

        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($valores);
    }

    public function delete($where)
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $stmt = $this->connect()->prepare($sql)->execute();

        //return $stmt->rowCount() == 1 ? true : false;
    }
}
