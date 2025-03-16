<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "Conexion.php";

try {
    $conexion = Conexion::conectar();
    if ($conexion) {
        echo "✅ Conexión exitosa a Oracle.";
    } else {
        echo "❌ Error de conexión.";
    }
} catch (Exception $e) {
    echo "❌ Error al conectar: " . $e->getMessage();
}
?>
