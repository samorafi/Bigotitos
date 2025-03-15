<?php
class Conexion {
    private static $dsn = "odbc:OracleDSN"; // Nombre del DSN configurado en ODBC
    private static $usuario = "tienda_mascotas"; // Usuario de Oracle
    private static $password = "tienda123"; // Contraseña de Oracle

    public static function conectar() {
        try {
            $conexion = new PDO(self::$dsn, self::$usuario, self::$password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("❌ Error de conexión: " . $e->getMessage());
        }
    }
}
?>