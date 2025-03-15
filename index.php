<?php
// index.php

// Incluir el archivo de conexión
require_once 'conexion.php';

// Obtener la acción desde la URL
$action = $_GET['action'] ?? 'inicio';

// Enrutamiento básico
switch ($action) {
    case 'listar_productos':
        require_once 'controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->listar();
        break;

    case 'crear_producto':
        require_once 'controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->crear();
        break;

    case 'editar_producto':
        require_once 'controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->editar($_GET['id']);
        break;

    case 'eliminar_producto':
        require_once 'controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->eliminar($_GET['id']);
        break;

    default:
        echo "Bienvenido a la tienda de mascotas.";
        break;
}
?>