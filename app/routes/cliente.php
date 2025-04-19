<?php

require_once '../controllers/ClienteController.php';

$controller = new ClienteController();

var_dump($controller->buscarClienteId(1));

switch ($_SERVER['REQUEST_METHOD']) {
    // case 'GET':
    //     if (isset($_GET['id'])) {
    //         try {
    //             json_encode($controller->buscarClienteId($_GET['id']));
    //         } catch (Exception $e) {
    //             echo 'Caught exception: ',  $e->getMessage(), "\n";
    //         }
    //     }

    case 'POST':
        $json = file_get_contents('php://input');
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
