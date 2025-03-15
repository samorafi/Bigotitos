<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

class ProductosModel {

    public static function InsertarProducto($id_producto, $nombre, $descripcion, $precio, $existencias, $id_categoria, $id_especie, $id_proveedor) {
        try {
            $conexion = Conexion::conectar();
            $sentencia = "CALL SP_INSERTAR_PRODUCTO(:id_producto, :nombre, :descripcion, :precio, :existencias, :id_categoria, :id_especie, :id_proveedor)";
            
            $stmt = $conexion->prepare($sentencia);
            $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);  // 🚨 Se pasa como STRING por compatibilidad con ODBC
            $stmt->bindParam(':existencias', $existencias, PDO::PARAM_INT);
            $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
            $stmt->bindParam(':id_especie', $id_especie, PDO::PARAM_INT);
            $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);

            $resultado = $stmt->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListarProductos() {
        try {
            $conexion = Conexion::conectar();
            $sentencia = "CALL SP_LISTAR_PRODUCTOS()";  // Procedimiento para obtener productos
            $stmt = $conexion->query($sentencia);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public static function EliminarProducto($id_producto) {
        try {
            $conexion = Conexion::conectar();
            $sentencia = "CALL SP_ELIMINAR_PRODUCTO(:id_producto)";
            
            $stmt = $conexion->prepare($sentencia);
            $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
