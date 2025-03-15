<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

class ProductosModel {

    // 🔹 Obtener productos desde la VISTA `V_STOCK_PRODUCTOS`
    public static function ObtenerStockProductos() {
        try {
            $conexion = Conexion::conectar();
            $sentencia = "SELECT * FROM V_STOCK_PRODUCTOS";  
            $stmt = $conexion->query($sentencia);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // 🔹 Llamar la FUNCIÓN `OBTENER_STOCK_PRODUCTO`
    public static function ObtenerStockProducto($id_producto) {
        try {
            $conexion = Conexion::conectar();
            $sentencia = "SELECT PKG_PRODUCTOS.OBTENER_STOCK_PRODUCTO(:id_producto) AS STOCK FROM DUAL";
            $stmt = $conexion->prepare($sentencia);
            $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)["STOCK"];
        } catch (PDOException $e) {
            return -1;
        }
    }

    // 🔹 Insertar un producto mediante el PAQUETE `PKG_PRODUCTOS`
    public static function InsertarProducto($id_producto, $nombre, $descripcion, $precio, $existencias, $id_categoria, $id_especie, $id_proveedor) {
        try {
            $conexion = Conexion::conectar();
            $sentencia = "BEGIN PKG_PRODUCTOS.INSERTAR_PRODUCTO(:id_producto, :nombre, :descripcion, :precio, :existencias, :id_categoria, :id_especie, :id_proveedor); END;";
            
            $stmt = $conexion->prepare($sentencia);
            $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':existencias', $existencias, PDO::PARAM_INT);
            $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
            $stmt->bindParam(':id_especie', $id_especie, PDO::PARAM_INT);
            $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    // 🔹 Obtener auditoría de productos afectada por el TRIGGER `TR_AUDITORIA_PRODUCTOS`
    public static function ObtenerAuditoriaProductos() {
        try {
            $conexion = Conexion::conectar();
            $sentencia = "SELECT * FROM PRODUCTOS_AUDITORIA ORDER BY FECHA_MODIFICACION DESC";
            $stmt = $conexion->query($sentencia);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>
