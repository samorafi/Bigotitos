<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";


    function ConsultarClientesModel() {
        try {
            $enlace = AbrirBD();

            $sentencia = "BEGIN SP_OBTENER_CLIENTES_CS(:cursor); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);
            oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);

            oci_execute($cursor, OCI_DEFAULT);

            $clientes = [];
            while ($row = oci_fetch_assoc($cursor)) {
                $clientes[] = $row;
            }

            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);

            return $clientes;
        } catch (Exception $ex) {
            error_log("Error en ConsultarClientesModel: " . $ex->getMessage());
            return null;
        }
    }

    function ConsultarClienteModel($id_cliente) {
        try {
            $enlace = AbrirBD();

            $sentencia = "BEGIN SP_OBTENER_CLIENTE_CS(:V_ID_CLIENTE, :V_CURSOR); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ':V_ID_CLIENTE', $id_cliente, -1, SQLT_INT);
            oci_bind_by_name($stmt, ':V_CURSOR', $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);
    
            oci_execute($cursor);
    
            $usuario = null;
            if ($row = oci_fetch_assoc($cursor)) {
                $usuario = [
                    'ID_CLIENTE' => $id_cliente,
                    'ID_USUARIO' => $row['ID_USUARIO'],
                    'NOMBRE' => $row['NOMBRE'],
                    'APELLIDO' => $row['APELLIDO'],
                    'TELEFONO' => $row['TELEFONO'],
                    'CORREO' => $row['CORREO'],
                    'DIRECCION' => $row['DIRECCION']
                ];
            }
    
            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
    
            return $usuario;
    
        } catch (Exception $e) {
            error_log("Error en ConsultarClienteModel: " . $e->getMessage());
            return null;
        }
    }
    
    function IngresarClienteModel($id_usuario, $direccion){
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN SP_INSERTAR_CLIENTES(:P_ID_USUARIO, :P_DIRECCION); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_ID_USUARIO', $id_usuario);
            oci_bind_by_name($stmt, ':P_DIRECCION', $direccion);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en IngresarClienteModel: " . $e->getMessage());
            return false;
        }
    }

    function ActualizarClienteModel($id_cliente, $id_usuario, $direccion) {
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN SP_ACTUALIZAR_CLIENTES(:P_ID_CLIENTE, :P_ID_USUARIO, :P_DIRECCION); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_ID_CLIENTE', $id_cliente);
            oci_bind_by_name($stmt, ':P_ID_USUARIO', $id_usuario);
            oci_bind_by_name($stmt, ':P_DIRECCION', $direccion);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en ActualizarClienteModel: " . $e->getMessage());
            return false;
        }
    }  

    function EliminarClienteModel($id_cliente) {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN SP_ELIMINAR_CLIENTE(:P_ID_CLIENTE); END;";
            $stmt = oci_parse($enlace, $sql);

            oci_bind_by_name($stmt, ':P_ID_CLIENTE', $id_cliente, -1, SQLT_INT);

            $resultado = oci_execute($stmt);

            if ($resultado) {
                return true;
            } else {
                return false;
            }

            oci_free_statement($stmt);
            oci_close($enlace);
        } catch (Exception $e) {
            error_log("Error al eliminar cliente: " . $e->getMessage());
            return false;
        }
    }

?>

