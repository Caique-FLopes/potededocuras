<?php

require_once '../services/ProdutoService.php';

class ProdutoController
{

    private ProdutoService $services;

    public function __construct()
    {
        return $this->services = new ProdutoService();
    }
    public function cadastrarProduto(array $infos)
    {
        return $this->services->cadastrarProduto($infos);
    }
    public function buscarProdutoId(string $id)
    {
        return $this->services->buscarProdutoId($id);
    }
    public function listarProdutos()
    {
        return $this->services->listarProdutos();
    }
    public function listarProdutosPorCliente($clienteId)
    {
        return $this->services->listarProdutosPorCliente($clienteId);
    }
}
