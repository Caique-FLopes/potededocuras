<?php

require_once '../models/Vendas.php';

class VendasService
{
    private Vendas $vendas;
    public function __construct()
    {
        return $this->vendas = new Vendas();
    }
    public function cadastrarVendas(array $infos)
    {
        return $this->vendas->insert($infos);
    }

    public function buscarVendasId(string $id)
    {
        return $this->vendas->buscarId($id);
    }

    public function listarVendas()
    {
        return $this->vendas->listar();
    }
    public function atualizarVenda($where, $att)
    {
        return $this->vendas->update($where, $att);
    }
}
