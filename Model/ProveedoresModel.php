<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

function ConsultarProveedoresModel() {
    try {
        $enlace = AbrirBD();

        $sentencia = "BEGIN pkg_proveedores.SP_OBTENER_PROVEEDORES_CS(:cursor); END;";
        $stmt = oci_parse($enlace, $sentencia);

        $cursor = oci_new_cursor($enlace);
        oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt);
        oci_execute($cursor, OCI_DEFAULT);

        $proveedores = [];
        while ($row = oci_fetch_assoc($cursor)) {
            $proveedores[] = $row;
        }

        oci_free_statement($stmt);
        oci_free_statement($cursor);
        oci_close($enlace);

        return $proveedores;
    } catch (Exception $ex) {
        error_log("Error en ConsultarProveedoresModel: " . $ex->getMessage());
        return null;
    }
}

function ConsultarProveedorModel($id_proveedor) {
    try {
        $enlace = AbrirBD();

        $sentencia = "BEGIN pkg_proveedores.SP_OBTENER_PROVEEDOR_CS(:V_ID_PROVEEDOR, :V_CURSOR); END;";
        $stmt = oci_parse($enlace, $sentencia);

        $cursor = oci_new_cursor($enlace);

        oci_bind_by_name($stmt, ':V_ID_PROVEEDOR', $id_proveedor, -1, SQLT_INT);
        oci_bind_by_name($stmt, ':V_CURSOR', $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt);
        oci_execute($cursor);

        $proveedor = null;
        if ($row = oci_fetch_assoc($cursor)) {
            $proveedor = [
                'ID_PROVEEDOR' => $row['ID_PROVEEDOR'],
                'NOMBRE'       => $row['NOMBRE'],
                'TELEFONO'     => $row['TELEFONO'],
                'CORREO'       => $row['CORREO'],
                'ESTADO'       => $row['ESTADO']
            ];
        }
    

        oci_free_statement($stmt);
        oci_free_statement($cursor);
        oci_close($enlace);

        return $proveedor;

    } catch (Exception $e) {
        error_log("Error en ConsultarProveedorModel: " . $e->getMessage());
        return null;
    }
}

function IngresarProveedorModel($nombre, $telefono, $correo) {
    try {
        $enlace = AbrirBD();

        $sql = 'BEGIN pkg_proveedores.SP_INSERTAR_PROVEEDOR(:P_NOMBRE, :P_TELEFONO, :P_CORREO); END;';
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_NOMBRE', $nombre);
        oci_bind_by_name($stmt, ':P_TELEFONO', $telefono);
        oci_bind_by_name($stmt, ':P_CORREO', $correo);

        $ejecutado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $ejecutado;
    } catch (Exception $e) {
        error_log("Error en IngresarProveedorModel: " . $e->getMessage());
        return false;
    }
}

function ActualizarProveedorModel($id_proveedor, $nombre, $telefono, $correo) {
    try {
        $enlace = AbrirBD();

        $sql = 'BEGIN pkg_proveedores.SP_ACTUALIZAR_PROVEEDOR(:P_ID_PROVEEDOR, :P_NOMBRE, :P_TELEFONO, :P_CORREO); END;';
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_ID_PROVEEDOR', $id_proveedor);
        oci_bind_by_name($stmt, ':P_NOMBRE', $nombre);
        oci_bind_by_name($stmt, ':P_TELEFONO', $telefono);
        oci_bind_by_name($stmt, ':P_CORREO', $correo);

        $ejecutado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $ejecutado;
    } catch (Exception $e) {
        error_log("Error en ActualizarProveedorModel: " . $e->getMessage());
        return false;
    }
}

function EliminarProveedorModel($id_proveedor) {
    try {
        $enlace = AbrirBD();
        $sql = "BEGIN pkg_proveedores.SP_ELIMINAR_PROVEEDOR(:P_ID_PROVEEDOR); END;";
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_ID_PROVEEDOR', $id_proveedor, -1, SQLT_INT);

        $resultado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $resultado;
    } catch (Exception $e) {
        error_log("Error al eliminar proveedor: " . $e->getMessage());
        return false;
    }
}
?>