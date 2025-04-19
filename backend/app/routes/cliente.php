<?php

require_once '../controllers/ClienteController.php';

$controller = new ClienteController();


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            try {
                echo json_encode($controller->buscarClienteId($_GET['id']));
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        } else {
            try {
                echo json_encode($controller->listarClientes());
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        break;

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
                echo json_encode(['response' => 'sucess']);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        break;

    case 'PUT':
    case 'DELETE':
}
