<?php

include ('../models/ProductoDAO.php');

header("Content-Type: application/json");

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$method = $_SERVER['REQUEST_METHOD'];

$productoDAO = new ProductoDAO();

switch ($method) {
    case 'GET':
        $resultado = $productoDAO->traerDatos();
        echo(json_encode($resultado));
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $respuesta = $productoDAO->agregarProducto($nombre, $descripcion);
        echo(json_encode($respuesta));
        break;    

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $respuesta = $productoDAO->actualizarProducto($data['id'],$data ['nombre'], $data['descripcion']);
        echo(json_encode($respuesta));
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'), true);
        $eliminar = $productoDAO->eliminarProducto($data['id']);
        echo(json_encode($eliminar));
        break;

    default:
        http_response_code(405);
        echo json_encode(array("message" => "Método No Permitido"));
        break;
}

?>