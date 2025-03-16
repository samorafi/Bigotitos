<?php
class Conexion {
    private static $dsn = "odbc:OracleDSN"; 
    private static $usuario = "tienda_mascotas";
    private static $password = "tienda123"; 

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