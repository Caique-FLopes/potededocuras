<?php

require_once '../models/Produto.php';

class ProdutoService
{
    private Produto $produto;
    public function __construct()
    {
        return $this->produto = new Produto();
    }
    public function cadastrarProduto(array $infos)
    {
        return $this->produto->insert($infos);
    }

    public function buscarProdutoId(string $id)
    {
        return $this->produto->buscarId($id);
    }

    public function listarProdutos()
    {
        return $this->produto->listar();
    }
}
