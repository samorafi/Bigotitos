<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

class ProveedoresModel {

    // 🔹 Insertar Proveedor 
    public static function InsertarProveedor($id, $nombre, $telefono, $correo) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("CALL SP_INSERTAR_PROVEEDOR(:id, :nombre, :telefono, :correo)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return "Error en la ejecución de la consulta";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    // 🔹 Actualizar Proveedor
    public static function ActualizarProveedor($id, $nombre, $telefono, $correo) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("CALL PKG_PROVEEDORES.ACTUALIZAR_PROVEEDOR(:id, :nombre, :telefono, :correo)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // 🔹 Eliminar Proveedor
    public static function EliminarProveedor($id) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("CALL PKG_PROVEEDORES.ELIMINAR_PROVEEDOR(:id)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /* 🔹  Codigo por corregir "EVITAR EL USO DEL SELECT"
    public static function ConsultarProveedores() {
        try {
            $conexion = Conexion::conectar();
            
            // Ahora ejecutamos directamente una consulta sin SYS_REFCURSOR
            $stmt = $conexion->query("SELECT ID_PROVEEDOR, NOMBRE, TELEFONO, CORREO FROM PROVEEDORES");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            return ["error" => "Error en la consulta SQL: " . $e->getMessage()];
        }
    }*/
    
}    
?>
