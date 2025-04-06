<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

class ProductosModel {

    // 🔹 Obtener el próximo ID de Producto
    public static function ObtenerProximoID() {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->query("SELECT NVL(MAX(ID_PRODUCTO), 0) + 1 AS PROXIMO_ID FROM PRODUCTOS");
            return $stmt->fetch(PDO::FETCH_ASSOC)["PROXIMO_ID"];
        } catch (PDOException $e) {
            return 1;
        }
    }

    // 🔹 Obtener todos los productos desde la vista `V_STOCK_PRODUCTOS`
    public static function ConsultarProductos() {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->query("SELECT * FROM V_STOCK_PRODUCTOS");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // 🔹 Obtener un producto por ID usando el procedimiento almacenado
    public static function ObtenerProducto($id_producto) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("CALL SP_OBTENER_PRODUCTO(:id, :nombre, :descripcion, :precio, :existencias)");
            $stmt->bindParam(':id', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    // 🔹 Insertar un producto usando el procedimiento almacenado
    public static function InsertarProducto($id, $nombre, $descripcion, $precio, $existencias, $categoria, $especie, $proveedor) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("CALL PKG_PRODUCTOS.INSERTAR_PRODUCTO(:id, :nombre, :descripcion, :precio, :existencias, :categoria, :especie, :proveedor)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':existencias', $existencias, PDO::PARAM_INT);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindParam(':especie', $especie, PDO::PARAM_INT);
            $stmt->bindParam(':proveedor', $proveedor, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    // 🔹 Actualizar un producto usando el paquete almacenado
    public static function ActualizarProducto($id, $nombre, $descripcion, $precio, $existencias, $categoria, $especie, $proveedor) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("CALL PKG_PRODUCTOS.ACTUALIZAR_PRODUCTO(:id, :nombre, :descripcion, :precio, :existencias, :categoria, :especie, :proveedor)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':existencias', $existencias, PDO::PARAM_INT);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindParam(':especie', $especie, PDO::PARAM_INT);
            $stmt->bindParam(':proveedor', $proveedor, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    // 🔹 Eliminar un producto usando el paquete almacenado
    public static function EliminarProducto($id_producto) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("CALL PKG_PRODUCTOS.ELIMINAR_PRODUCTO(:id)");
            $stmt->bindParam(':id', $id_producto, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
