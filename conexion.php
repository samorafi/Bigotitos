<?php
function AbrirBD() {
    $usuario = "tienda_mascotas1";
    $password = "tienda1234";
    $host = "localhost/XE";

    $conexion = oci_connect($usuario, $password, $host, 'AL32UTF8');

    if (!$conexion) {
        $error = oci_error();
        die("Error de conexión: " . $error['message']);
    }

    return $conexion;
}

function CerrarBD($conexion) {
    oci_close($conexion);
}
?>
