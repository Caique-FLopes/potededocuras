<?php

require_once '../services/VendasServices.php';

class VendasController
{

    private VendasService $services;

    public function __construct()
    {
        return $this->services = new VendasService();
    }
    public function cadastrarVendas(array $infos)
    {
        $regra = [
            'id_cliente' => $infos['id_cliente'],
            'id_produto' => $infos['id_produto'],
            'data_venda' => $infos['data_venda'],
        ];

        if ($this->services->listarVendas($regra)) {
            $where = "id_cliente = {$infos['id_cliente']} and data_venda = '{$infos['data_venda']}' and id_produto = {$infos['id_produto']};";

            $att = ['quantidade' => $infos['quantidade']];

            return $this->services->atualizarVenda($where, $att);
        } else {
            return $this->services->cadastrarVendas($infos);
        }
    }
    public function buscarVendasId(string $id)
    {
        return $this->services->buscarVendasId($id);
    }
    public function listarVendas()
    {
        return $this->services->listarVendas();
    }
}
