<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

function ObtenerClientesPremiumModel() {
    try {
        $conn = AbrirBD();

        $sql = "SELECT NOMBRE || ' ' || APELLIDO AS NOMBRE_COMPLETO, TOTAL_GASTADO FROM V_CLIENTES_PREMIUM";
        $stmt = oci_parse($conn, $sql);
        oci_execute($stmt);

        $clientes = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $clientes[] = $row;
        }

        oci_free_statement($stmt);
        oci_close($conn);

        return $clientes;
    } catch (Exception $e) {
        error_log("Error en ObtenerClientesPremiumModel: " . $e->getMessage());
        return [];
    }
}

function ObtenerStockProductos() {
    $conn = AbrirBD();
    $datos = [];

    if (!$conn) {
        return $datos;
    }

    $sql = "SELECT PRODUCTO, PROVEEDOR, EXISTENCIAS FROM V_STOCK_PRODUCTOS";
    $stmt = oci_parse($conn, $sql);

    if (oci_execute($stmt)) {
        while ($row = oci_fetch_assoc($stmt)) {
            $datos[] = $row;
        }
    }

    oci_free_statement($stmt);
    oci_close($conn);

    return $datos;
}
?>