<?php
// controllers/ProductoController.php

require_once __DIR__ . '/../models/ProductoModel.php';

class ProductoController {
    private $model;

    public function __construct() {
        $this->model = new ProductoModel();
    }

    public function listar() {
        $productos = $this->model->listarProductos();
        require_once '../views/productos/listar.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $existencias = $_POST['existencias'];
            $id_categoria = $_POST['id_categoria'];
            $id_especie = $_POST['id_especie'];
            $id_proveedor = $_POST['id_proveedor'];

            if ($this->model->insertarProducto($id, $nombre, $descripcion, $precio, $existencias, $id_categoria, $id_especie, $id_proveedor)) {
                header('Location: index.php?action=listar_productos');
            } else {
                echo "Error al crear el producto.";
            }
        } else {
            require_once '../views/productos/crear.php';
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $existencias = $_POST['existencias'];
            $id_categoria = $_POST['id_categoria'];
            $id_especie = $_POST['id_especie'];
            $id_proveedor = $_POST['id_proveedor'];

            if ($this->model->actualizarProducto($id, $nombre, $descripcion, $precio, $existencias, $id_categoria, $id_especie, $id_proveedor)) {
                header('Location: index.php?action=listar_productos');
            } else {
                echo "Error al actualizar el producto.";
            }
        } else {
            $producto = $this->model->obtenerProducto($id);
            require_once '../views/productos/editar.php';
        }
    }

    public function eliminar($id) {
        if ($this->model->eliminarProducto($id)) {
            header('Location: index.php?action=listar_productos');
        } else {
            echo "Error al eliminar el producto.";
        }
    }
}
?>