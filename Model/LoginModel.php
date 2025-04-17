<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

function IniciarSesionModel(string $correo, string $contrasenna): ?array
{
    try {
        // Abrir conexión OCI
        $enlace = AbrirBD();

        // Bloque PL/SQL que invoca al procedimiento con todos los parámetros
        $sql = "
            BEGIN
                sp_login(:p_correo,:p_contrasenna,:p_id_usuario,:p_nombre,:p_apellido,:p_id_estado,:p_tipo_usuario); END;";

        $stmt = oci_parse($enlace, $sql);

        // Parámetros de entrada
        oci_bind_by_name($stmt, ':p_correo',      $correo);
        oci_bind_by_name($stmt, ':p_contrasenna', $contrasenna);

        // Parámetros de salida (longitudes según definición en el SP)
        oci_bind_by_name($stmt, ':p_id_usuario',   $id_usuario,   32);
        oci_bind_by_name($stmt, ':p_nombre',       $nombre,       255);
        oci_bind_by_name($stmt, ':p_apellido',     $apellido,     255);
        oci_bind_by_name($stmt, ':p_id_estado',    $id_estado,    32);
        oci_bind_by_name($stmt, ':p_tipo_usuario', $tipo_usuario, 20);

        // Ejecutar
        if (!oci_execute($stmt)) {
            $e = oci_error($stmt);
            error_log("OCI Error en IniciarSesionModel: " . $e['message']);
            CerrarBD($enlace);
            return null;
        }

        // Cerrar recursos
        oci_free_statement($stmt);
        CerrarBD($enlace);

        // Si no devolvió ID, la autenticación falló
        if ($id_usuario === null) {
            return null;
        }

        // Retornar datos del usuario
        return [
            'id_usuario'   => $id_usuario,
            'nombre'       => $nombre,
            'apellido'     => $apellido,
            'id_estado'    => $id_estado,
            'tipo_usuario' => $tipo_usuario,
        ];

    } catch (Exception $e) {
        error_log("Exception en IniciarSesionModel: " . $e->getMessage());
        return null;
    }
}

?>

