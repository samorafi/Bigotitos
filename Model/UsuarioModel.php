<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

    function ConsultarUsuariosModel() {
        try {

            $enlace = AbrirBD();

            $sentencia = "BEGIN PKG_USUARIOS.SP_OBTENER_USUARIOS_CS(:cursor); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);

            oci_execute($cursor);

            $usuarios = [];

            while ($row = oci_fetch_assoc($cursor)) {
                $usuarios[] = $row;
            }

            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
            return $usuarios;

        } catch (Exception $ex) {
            error_log("Error en ConsultarUsuariosModel: " . $ex->getMessage());
            return null;
        }
    }

    function ConsultarUsuarioModel($id_usuario) {
        try {
            $enlace = AbrirBD();

            $sentencia = "BEGIN PKG_USUARIOS.SP_OBTENER_USUARIO_CS(:V_ID_USUARIO, :V_CURSOR); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ':V_ID_USUARIO', $id_usuario, -1, SQLT_INT);
            oci_bind_by_name($stmt, ':V_CURSOR', $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);
    
            oci_execute($cursor);
    
            $usuario = null;
            if ($row = oci_fetch_assoc($cursor)) {
                $usuario = [
                    'ID_USUARIO' => $id_usuario,
                    'NOMBRE' => $row['NOMBRE'],
                    'APELLIDO' => $row['APELLIDO'],
                    'TELEFONO' => $row['TELEFONO'],
                    'CORREO' => $row['CORREO']
                ];
            }
    
            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
    
            return $usuario;
    
        } catch (Exception $e) {
            error_log("Error en ConsultarUsuarioModel: " . $e->getMessage());
            return null;
        }
    }
      
    function IngresarUsuarioModel($nombre, $apellido, $telefono, $correo, $contrasenna){
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN PKG_USUARIOS.SP_INSERTAR_USUARIO(:P_NOMBRE, :P_APELLIDO, :P_TELEFONO, :P_CORREO, :P_CONTRASENNA); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_NOMBRE', $nombre);
            oci_bind_by_name($stmt, ':P_APELLIDO', $apellido);
            oci_bind_by_name($stmt, ':P_TELEFONO', $telefono);
            oci_bind_by_name($stmt, ':P_CORREO', $correo);
            oci_bind_by_name($stmt, ':P_CONTRASENNA', $contrasenna);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en IngresarUsuarioModel: " . $e->getMessage());
            return false;
        }
    }

    function ActualizarUsuarioModel($id_usuario, $nombre, $apellido, $telefono, $correo) {
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN PKG_USUARIOS.SP_ACTUALIZAR_USUARIO(:P_ID_USUARIO, :P_NOMBRE, :P_APELLIDO, :P_TELEFONO, :P_CORREO); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_ID_USUARIO', $id_usuario);
            oci_bind_by_name($stmt, ':P_NOMBRE', $nombre);
            oci_bind_by_name($stmt, ':P_APELLIDO', $apellido);
            oci_bind_by_name($stmt, ':P_TELEFONO', $telefono);
            oci_bind_by_name($stmt, ':P_CORREO', $correo);
    
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

    function EliminarUsuarioModel($id_usuario) {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN PKG_USUARIOS.SP_ELIMINAR_USUARIO(:V_ID_USUARIO); END;";
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':V_ID_USUARIO', $id_usuario, -1, SQLT_INT);
    
            $resultado = oci_execute($stmt);
    
            oci_free_statement($stmt);
            oci_close($enlace);
    
            return $resultado;
    
        } catch (Exception $e) {
            error_log("Error al eliminar usuario: " . $e->getMessage());
            return false;
        }
    }
    

?>