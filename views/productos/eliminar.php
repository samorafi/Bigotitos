<?php
// eliminar.php

// Obtener el ID del producto desde la URL
$id = $_GET['id'];

// Incluir el controlador
require_once '../../controllers/ProductoController.php';

// Crear una instancia del controlador
$controller = new ProductoController();

// Llamar al método eliminar con el ID
$controller->eliminar($id);
?>