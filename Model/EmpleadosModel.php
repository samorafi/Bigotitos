<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";


    function ConsultarEmpleadosModel() {
        try {
            $enlace = AbrirBD(); 
            $sql = "BEGIN SP_OBTENER_EMPLEADOS_CS(:P_CURSOR); END;";

            $stmt = oci_parse($enlace, $sql);
            $cursor = oci_new_cursor($enlace);
            oci_bind_by_name($stmt, ":P_CURSOR", $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);

            oci_execute($cursor);

            $empleados = [];
            while ($row = oci_fetch_assoc($cursor)) {
                $empleados[] = $row;
            }

            oci_free_statement($stmt);
            oci_free_cursor($cursor);
            oci_close($enlace);

            return $empleados;
        } catch (Exception $e) {
            error_log("Error al obtener empleados: " . $e->getMessage());
            return false;
        }
    }
    
    function ConsultarEmpleadoModel($id_empleado) {
        try {
            $enlace = AbrirBD();

            $sentencia = "BEGIN SP_OBTENER_EMPLEADO_CS(:V_ID_EMPLEADO, :V_CURSOR); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ':V_ID_EMPLEADO', $id_empleado, -1, SQLT_INT);
            oci_bind_by_name($stmt, ':V_CURSOR', $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);
    
            oci_execute($cursor);
    
            $usuario = null;
            if ($row = oci_fetch_assoc($cursor)) {
                $usuario = [
                    'ID_EMPLEADO' => $id_empleado,
                    'ID_USUARIO' => $row['ID_USUARIO'],
                    'NOMBRE' => $row['NOMBRE'],
                    'APELLIDO' => $row['APELLIDO'],
                    'TELEFONO' => $row['TELEFONO'],
                    'CORREO' => $row['CORREO'],
                    'CARGO' => $row['CARGO']
                ];
            }
    
            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
    
            return $usuario;
    
        } catch (Exception $e) {
            error_log("Error en ConsultarEmpleadoModel: " . $e->getMessage());
            return null;
        }
    }

    function IngresarEmpleadoModel($id_usuario, $cargo){
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN SP_INSERTAR_EMPLEADOS(:P_ID_USUARIO, :P_CARGO); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_ID_USUARIO', $id_usuario);
            oci_bind_by_name($stmt, ':P_CARGO', $cargo);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en IngresarEmpleadoModel: " . $e->getMessage());
            return false;
        }
    }

    function ActualizarEmpleadoModel($id_empleado, $id_usuario, $cargo) {
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN SP_ACTUALIZAR_EMPLEADOS(:P_ID_EMPLEADO, :P_ID_USUARIO, :P_CARGO); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_ID_EMPLEADO', $id_empleado);
            oci_bind_by_name($stmt, ':P_ID_USUARIO', $id_usuario);
            oci_bind_by_name($stmt, ':P_CARGO', $cargo);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en ActualizarUsuarioModel: " . $e->getMessage());
            return false;
        }
    }  

    function EliminarEmpleadoModel($id_empleado) {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN SP_ELIMINAR_EMPLEADOS(:P_ID_EMPLEADO); END;";
            $stmt = oci_parse($enlace, $sql);

            oci_bind_by_name($stmt, ':P_ID_EMPLEADO', $id_empleado, -1, SQLT_INT);

            $resultado = oci_execute($stmt);

            if ($resultado) {
                return true;
            } else {
                return false;
            }

            oci_free_statement($stmt);
            oci_close($enlace);
        } catch (Exception $e) {
            error_log("Error al eliminar empleado: " . $e->getMessage());
            return false;
        }
    }

?>

