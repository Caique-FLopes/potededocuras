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
        if ($this->listarVendas(['id_cliente' => $infos['id_cliente'], 'data_venda' => $infos['data_venda']])) {

            $where = "id_cliente = {$infos['id_cliente']} and data_venda = '{$infos['data_venda']}';";
            $att = ['quantidade' => $infos['quantidade']];
            return $this->services->atualizarVenda($where, $att);
        } else {
            return $this->services->cadastrarVendas($infos);
        }
        $this->services->cadastrarVendas($infos);
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
