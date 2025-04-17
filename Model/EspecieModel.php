<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

// Obtener todas las especies
function ConsultarEspeciesModel() {
    try {
        $enlace = AbrirBD();

        $sentencia = "BEGIN pkg_especie.SP_OBTENER_ESPECIES_CS(:cursor); END;";
        $stmt = oci_parse($enlace, $sentencia);

        $cursor = oci_new_cursor($enlace);
        oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt);
        oci_execute($cursor, OCI_DEFAULT);

        $especies = [];
        while ($row = oci_fetch_assoc($cursor)) {
            $especies[] = $row;
        }

        oci_free_statement($stmt);
        oci_free_statement($cursor);
        oci_close($enlace);

        return $especies;
    } catch (Exception $ex) {
        error_log("Error en ConsultarEspeciesModel: " . $ex->getMessage());
        return null;
    }
}

// Obtener especie por ID
function ConsultarEspecieModel($id_especie) {
    try {
        $enlace = AbrirBD();

        $sentencia = "BEGIN pkg_especie.SP_OBTENER_ESPECIE_CS(:V_ID_ESPECIE, :V_CURSOR); END;";
        $stmt = oci_parse($enlace, $sentencia);

        $cursor = oci_new_cursor($enlace);

        oci_bind_by_name($stmt, ':V_ID_ESPECIE', $id_especie, -1, SQLT_INT);
        oci_bind_by_name($stmt, ':V_CURSOR', $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt);
        oci_execute($cursor);

        $especie = null;
        if ($row = oci_fetch_assoc($cursor)) {
            $especie = [
                'ID_ESPECIE' => $row['ID_ESPECIE'],
                'NOMBRE'     => $row['NOMBRE'],
                'ESTADO'     => $row['ESTADO']
            ];
        }

        oci_free_statement($stmt);
        oci_free_statement($cursor);
        oci_close($enlace);

        return $especie;

    } catch (Exception $e) {
        error_log("Error en ConsultarEspecieModel: " . $e->getMessage());
        return null;
    }
}

// Insertar especie
function IngresarEspecieModel($nombre) {
    try {
        $enlace = AbrirBD();

        $sql = 'BEGIN pkg_especie.SP_INSERTAR_ESPECIE(:P_NOMBRE); END;';
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_NOMBRE', $nombre);

        $ejecutado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $ejecutado;
    } catch (Exception $e) {
        error_log("Error en IngresarEspecieModel: " . $e->getMessage());
        return false;
    }
}

// Actualizar especie
function ActualizarEspecieModel($id_especie, $nombre) {
    try {
        $enlace = AbrirBD();

        $sql = 'BEGIN pkg_especie.SP_ACTUALIZAR_ESPECIE(:P_ID_ESPECIE, :P_NOMBRE); END;';
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_ID_ESPECIE', $id_especie);
        oci_bind_by_name($stmt, ':P_NOMBRE', $nombre);

        $ejecutado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $ejecutado;
    } catch (Exception $e) {
        error_log("Error en ActualizarEspecieModel: " . $e->getMessage());
        return false;
    }
}

// Eliminar (cambiar estado) especie
function EliminarEspecieModel($id_especie) {
    try {
        $enlace = AbrirBD();

        $sql = "BEGIN pkg_especie.SP_ELIMINAR_ESPECIE(:P_ID_ESPECIE); END;";
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_ID_ESPECIE', $id_especie, -1, SQLT_INT);

        $resultado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $resultado;
    } catch (Exception $e) {
        error_log("Error en EliminarEspecieModel: " . $e->getMessage());
        return false;
    }
}
?>
