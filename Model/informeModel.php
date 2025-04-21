<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

function ObtenerClientesPremiumModel() {
    try {
        $conn = AbrirBD();

        $stmt = oci_parse($conn, "BEGIN PK_REPORTES.MOSTRAR_CLIENTES_PREMIUM(:cursor); END;");
        
        $cursor = oci_new_cursor($conn);
        oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt);     
        oci_execute($cursor);     

        $clientes = [];
        while ($row = oci_fetch_assoc($cursor)) {
            $clientes[] = $row;
        }

        oci_free_statement($stmt);
        oci_free_statement($cursor);
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

    $stmt = oci_parse($conn, "BEGIN PK_REPORTES.MOSTRAR_STOCK_PRODUCTOS(:cursor); END;");
    $cursor = oci_new_cursor($conn);

    oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

    if (oci_execute($stmt) && oci_execute($cursor)) {
        while ($row = oci_fetch_assoc($cursor)) {
            $datos[] = $row;
        }
    }

    oci_free_statement($stmt);
    oci_free_statement($cursor);
    oci_close($conn);

    return $datos;
}


function ObtenerResumenGeneralModel() {
    $conn = AbrirBD();
    $sql = "BEGIN
        :clientes := pkg_funciones.fn_total_clientes;
        :empleados := pkg_funciones.fn_total_empleados;
        :proveedores := pkg_funciones.fn_total_proveedores;
        :ventas := pkg_funciones.fn_total_ventas;
        :monto := pkg_funciones.fn_total_monto_ventas;
        :mas_vendido := pkg_funciones.fn_producto_mas_vendido;
        :mas_caro := pkg_funciones.fn_producto_mas_caro;
        :total_productos := pkg_funciones.fn_total_productos;
        :total_especies := pkg_funciones.fn_total_especies;
        :maximo_pago := pkg_funciones.fn_maximo_pago_cliente;
        :total_categorias := pkg_funciones.fn_total_categorias;
        :especie_mas_vendida := pkg_funciones.fn_especie_mas_vendida;
        :cliente_frecuente := pkg_funciones.fn_cliente_mas_frecuente;
        :empleado_top := pkg_funciones.fn_empleado_top_ventas;
        :categoria_top := pkg_funciones.fn_categoria_mas_vendida;
    END;";

    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":clientes", $totalClientes, 32);
    oci_bind_by_name($stmt, ":empleados", $totalEmpleados, 32);
    oci_bind_by_name($stmt, ":proveedores", $totalProveedores, 32);
    oci_bind_by_name($stmt, ":ventas", $totalVentas, 32);
    oci_bind_by_name($stmt, ":monto", $totalMonto, 32);
    oci_bind_by_name($stmt, ":mas_vendido", $masVendido, 255);
    oci_bind_by_name($stmt, ":mas_caro", $masCaro, 255);
    oci_bind_by_name($stmt, ":total_productos", $totalProductos, 32);
    oci_bind_by_name($stmt, ":total_especies", $totalEspecies, 32);
    oci_bind_by_name($stmt, ":maximo_pago", $maximoPago, 32);
    oci_bind_by_name($stmt, ":total_categorias", $totalCategorias, 32);
    oci_bind_by_name($stmt, ":especie_mas_vendida", $especieMasVendida, 255);
    oci_bind_by_name($stmt, ":cliente_frecuente", $clienteFrecuente, 255);
    oci_bind_by_name($stmt, ":empleado_top", $empleadoTop, 255);
    oci_bind_by_name($stmt, ":categoria_top", $categoriaTop, 255);

    oci_execute($stmt);

    oci_free_statement($stmt);
    oci_close($conn);

    return [
        'Total Clientes' => $totalClientes,
        'Total Empleados' => $totalEmpleados,
        'Total Proveedores' => $totalProveedores,
        'Ventas Realizadas' => $totalVentas,
        '₡ Total Vendido' => number_format((float)str_replace(',', '.', $totalMonto), 2),
        'Producto más Vendido' => $masVendido,
        'Producto más Caro' => $masCaro,
        'Total Productos' => $totalProductos,
        'Total Especies' => $totalEspecies,
        'Máximo Pago Cliente' => '₡ ' . number_format($maximoPago, 2),
        'Total Categorías' => $totalCategorias,
        'Especie más Vendida' => $especieMasVendida,
        'Cliente más Frecuente' => $clienteFrecuente,
        'Empleado Top Ventas' => $empleadoTop,
        'Categoría más Vendida' => $categoriaTop
    ];
}
?>
