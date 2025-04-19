<?php

require_once "../services/ClienteService.php";

class ClienteController
{
    private ClienteService $services;

    public function __construct()
    {
        return $this->services = new ClienteService();
    }
    public function cadastrarCliente(array $infos)
    {
        return $this->services->cadastrarCliente($infos);
    }
    public function buscarClienteId(string $id)
    {
        return $this->services->buscarClienteId($id);
    }
    public function listarClientes()
    {
        return $this->services->listarClientes();
    }
}
