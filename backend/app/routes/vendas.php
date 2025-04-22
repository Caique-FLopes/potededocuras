<?php

require_once '../controllers/VendasController.php';

$controller = new VendasController();


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            try {
                echo json_encode($controller->buscarVendasId($_GET['id']));
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        } else {
            try {
                echo json_encode($controller->listarVendas());
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        break;

    case 'POST':
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['id_cliente'], $data['id_produto'], $data['data_venda'], $data['quantidade'])) {
            $infos = [
                'id_cliente' => $data['id_cliente'],
                'id_produto' => $data['id_produto'],
                'data_venda' => $data['data_venda'],
                'quantidade' => $data['quantidade'],
            ];

            try {
                $controller->cadastrarVendas($infos);
                echo json_encode(['response' => 'sucess']);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        break;

    case 'PUT':
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['id_cliente'], $data['id_produto'], $data['data_venda'], $data['quantidade'])) {
            $infos = [
                'id_cliente' => $data['id_cliente'],
                'id_produto' => $data['id_produto'],
                'data_venda' => $data['data_venda'],
                'quantidade' => $data['quantidade'],
            ];

            try {
                $controller->cadastrarVendas($infos);
                echo json_encode(['response' => 'sucess']);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        break;

    case 'DELETE':
}
