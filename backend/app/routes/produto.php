<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once '../controllers/ProdutoController.php';

$controller = new ProdutoController();


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        try {
            if (isset($_GET['id'])) {
                echo json_encode($controller->buscarProdutoId($_GET['id']));
            } elseif (isset($_GET['cliente_id'])) {
                echo json_encode($controller->listarProdutosPorCliente($_GET['cliente_id']));
            } else {
                echo json_encode($controller->listarProdutos());
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        break;

    case 'POST':
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['nome'], $data['valor'], $data['imagem'], $data['quantidade'])) {
            $infos = [
                'nome' => $data['nome'],
                'valor' => $data['valor'],
                'imagem' => $data['imagem'],
                'quantidade' => $data['quantidade'],
            ];

            try {
                $controller->cadastrarProduto($infos);
                echo json_encode(['response' => 'sucess']);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        break;

    case 'PUT':
    case 'DELETE':
}
