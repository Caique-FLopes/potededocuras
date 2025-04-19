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
        return $this->services->cadastrarVendas($infos);
    }
    public function buscarVendasId(string $id)
    {
        return $this->services->buscarVendasId($id);
    }
    public function listarVendass()
    {
        return $this->services->listarVendass();
    }
}
