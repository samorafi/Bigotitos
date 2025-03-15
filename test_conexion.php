<?php
require_once 'Conexion.php';

try {
    $conexion = Conexion::conectar();
    echo "✅ Conexión exitosa usando PDO y DSN.";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>