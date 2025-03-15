<?php
// models/ProductoModel.php

require_once 'conexion.php';

class ProductoModel {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::conectar();
    }

    public function listarProductos() {
        $sql = 'SELECT * FROM PRODUCTOS';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarProducto($id, $nombre, $descripcion, $precio, $existencias, $id_categoria, $id_especie, $id_proveedor) {
        $sql = 'BEGIN SP_INSERTAR_PRODUCTO(:id, :nombre, :descripcion, :precio, :existencias, :id_categoria, :id_especie, :id_proveedor); END;';
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':existencias', $existencias);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->bindParam(':id_especie', $id_especie);
        $stmt->bindParam(':id_proveedor', $id_proveedor);

        return $stmt->execute();
    }

    public function obtenerProducto($id) {
        $sql = 'BEGIN SP_OBTENER_PRODUCTO(:id, :nombre, :descripcion, :precio, :existencias); END;';
        $stmt = $this->conn->prepare($sql);

        $nombre = '';
        $descripcion = '';
        $precio = 0;
        $existencias = 0;

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 255);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR, 4000);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':existencias', $existencias);

        if ($stmt->execute()) {
            return [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'existencias' => $existencias
            ];
        } else {
            return false;
        }
    }

    public function actualizarProducto($id, $nombre, $descripcion, $precio, $existencias, $id_categoria, $id_especie, $id_proveedor) {
        $sql = 'BEGIN SP_ACTUALIZAR_PRODUCTO(:id, :nombre, :descripcion, :precio, :existencias, :id_categoria, :id_especie, :id_proveedor); END;';
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':existencias', $existencias);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->bindParam(':id_especie', $id_especie);
        $stmt->bindParam(':id_proveedor', $id_proveedor);

        return $stmt->execute();
    }

    public function eliminarProducto($id) {
        $sql = 'BEGIN SP_ELIMINAR_PRODUCTO(:id); END;';
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>