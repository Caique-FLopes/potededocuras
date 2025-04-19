<?php

require_once '../models/Cliente.php';

class ClienteService
{
    private Cliente $cliente;
    public function __construct()
    {
        return $this->cliente = new Cliente();
    }
    public function cadastrarCliente(array $infos)
    {
        return $this->cliente->insert($infos);
    }
}
