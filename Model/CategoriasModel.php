<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

// Consultar todas las categorías
function ConsultarCategoriasModel() {
    try {
        $enlace = AbrirBD();

        $sentencia = "BEGIN pkg_categorias.SP_OBTENER_CATEGORIAS_CS(:cursor); END;";
        $stmt = oci_parse($enlace, $sentencia);

        $cursor = oci_new_cursor($enlace);
        oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt);
        oci_execute($cursor, OCI_DEFAULT);

        $categorias = [];
        while ($row = oci_fetch_assoc($cursor)) {
            $categorias[] = $row;
        }

        oci_free_statement($stmt);
        oci_free_statement($cursor);
        oci_close($enlace);

        return $categorias;
    } catch (Exception $ex) {
        error_log("Error en ConsultarCategoriasModel: " . $ex->getMessage());
        return null;
    }
}

// Consultar una categoría por ID
function ConsultarCategoriaModel($id_categoria) {
    try {
        $enlace = AbrirBD();

        $sentencia = "BEGIN pkg_categorias.SP_OBTENER_CATEGORIA_CS(:V_ID_CATEGORIA, :V_CURSOR); END;";
        $stmt = oci_parse($enlace, $sentencia);

        $cursor = oci_new_cursor($enlace);

        oci_bind_by_name($stmt, ':V_ID_CATEGORIA', $id_categoria, -1, SQLT_INT);
        oci_bind_by_name($stmt, ':V_CURSOR', $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt);
        oci_execute($cursor);

        $categoria = null;
        if ($row = oci_fetch_assoc($cursor)) {
            $categoria = [
                'ID_CATEGORIA' => $row['ID_CATEGORIA'],
                'NOMBRE'       => $row['NOMBRE'],
                'ESTADO'       => $row['ESTADO']
            ];
        }

        oci_free_statement($stmt);
        oci_free_statement($cursor);
        oci_close($enlace);

        return $categoria;
    } catch (Exception $e) {
        error_log("Error en ConsultarCategoriaModel: " . $e->getMessage());
        return null;
    }
}

// Insertar una categoría
function IngresarCategoriaModel($nombre) {
    try {
        $enlace = AbrirBD();

        $sql = 'BEGIN pkg_categorias.SP_INSERTAR_CATEGORIA(:P_NOMBRE); END;';
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_NOMBRE', $nombre);

        $ejecutado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $ejecutado;
    } catch (Exception $e) {
        error_log("Error en IngresarCategoriaModel: " . $e->getMessage());
        return false;
    }
}

// Actualizar una categoría
function ActualizarCategoriaModel($id_categoria, $nombre) {
    try {
        $enlace = AbrirBD();

        $sql = 'BEGIN pkg_categorias.SP_ACTUALIZAR_CATEGORIA(:P_ID_CATEGORIA, :P_NOMBRE); END;';
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_ID_CATEGORIA', $id_categoria);
        oci_bind_by_name($stmt, ':P_NOMBRE', $nombre);

        $ejecutado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $ejecutado;
    } catch (Exception $e) {
        error_log("Error en ActualizarCategoriaModel: " . $e->getMessage());
        return false;
    }
}

// Eliminar (cambiar estado) de categoría
function EliminarCategoriaModel($id_categoria) {
    try {
        $enlace = AbrirBD();

        $sql = "BEGIN pkg_categorias.SP_ELIMINAR_CATEGORIA(:P_ID_CATEGORIA); END;";
        $stmt = oci_parse($enlace, $sql);

        oci_bind_by_name($stmt, ':P_ID_CATEGORIA', $id_categoria, -1, SQLT_INT);

        $resultado = oci_execute($stmt);

        oci_free_statement($stmt);
        oci_close($enlace);

        return $resultado;
    } catch (Exception $e) {
        error_log("Error en EliminarCategoriaModel: " . $e->getMessage());
        return false;
    }
}
?>