<?php

require_once '../controllers/ClienteController.php';

$controller = new ClienteController();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

    case 'POST':
        // Lê o corpo cru da requisição
        $json = file_get_contents('php://input');

        // Decodifica o JSON em array associativo
        $data = json_decode($json, true);

        if (isset($data['nome'], $data['tel'])) {
            $infos = [
                'nome' => $data['nome'],
                'tel' => $data['tel'],
            ];

            try {
                $controller->cadastrarCliente($infos);
                json_encode(['response' => 'sucess']);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }

    case 'PUT':
    case 'DELETE':
}
