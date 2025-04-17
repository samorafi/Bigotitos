<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

    function ConsultarDetalleVentasModel() {
        try {

            $enlace = AbrirBD();

            $sentencia = "BEGIN PKG_DETALLE_VENTA.SP_OBTENER_DETALLE_VENTAS_CS(:cursor); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);

            oci_execute($cursor);

            $Detalle_Ventas = [];

            while ($row = oci_fetch_assoc($cursor)) {
                $Detalle_Ventas[] = $row;
            }

            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
            return $Detalle_Ventas;

        } catch (Exception $ex) {
            error_log("Error en ConsultarDetalleVentasModel: " . $ex->getMessage());
            return null;
        }
    }

    function ConsultarDetalleVentaModel($id_detalle) {
        try {
            $enlace = AbrirBD();

            $sentencia = "BEGIN PKG_DETALLE_VENTA.SP_OBTENER_DETALLE_VENTA_CS(:P_ID_DETALLE, :P_CURSOR); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ':P_ID_DETALLE', $id_detalle, -1, SQLT_INT);
            oci_bind_by_name($stmt, ':P_CURSOR', $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);
    
            oci_execute($cursor);
    
            $Detalle_Venta = null;
            if ($row = oci_fetch_assoc($cursor)) {
                $Detalle_Venta = [
                    'ID_DETALLE' => $id_detalle,
                    'ID_VENTA' => $row['ID_VENTA'],
                    'CLIENTE' => $row['CLIENTE'],
                    'ID_PRODUCTO' => $row['ID_PRODUCTO'],
                    'NOMBREPRODUCTO' => $row['PRODUCTO'],
                    'CANTIDAD' => $row['CANTIDAD'],
                    'SUBTOTAL' => $row['SUBTOTAL'],
                    'ID_ESTADO' => $row['ID_ESTADO'],
                    'ESTADO' => $row['ESTADO']
                ];
            }
    
            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
    
            return $Detalle_Venta;
    
        } catch (Exception $e) {
            error_log("Error en ConsultarDetalleVentaModel: " . $e->getMessage());
            return null;
        }
    }
      
    function IngresarVentaModel($ID_VENTA, $ID_PRODUCTO, $CANTIDAD, $SUBTOTAL){
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN PKG_DETALLE_VENTA.SP_INSERTAR_DETALLE_VENTA(:P_ID_VENTA, :P_ID_PRODUCTO,:P_CANTIDAD,:P_SUBTOTAL); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_ID_VENTA', $ID_VENTA);
            oci_bind_by_name($stmt, ':P_ID_PRODUCTO', $ID_PRODUCTO);
            oci_bind_by_name($stmt, ':P_CANTIDAD', $CANTIDAD);
            oci_bind_by_name($stmt, ':P_SUBTOTAL', $SUBTOTAL);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en IngresarDetalleVentaModel: " . $e->getMessage());
            return false;
        }
    }
    

    function ActualizarVentaModel($ID_DETALLE, $ID_VENTA, $ID_PRODUCTO, $CANTIDAD, $SUBTOTAL) {
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN PKG_DETALLE_VENTA.SP_ACTUALIZAR_DETALLE_VENTA(:P_ID_DETALLE, :P_ID_VENTA, :P_ID_PRODUCTO,:P_CANTIDAD,:P_SUBTOTAL); END;';
            $stmt = oci_parse($enlace, $sql);
            
            oci_bind_by_name($stmt, ':P_ID_DETALLE', $ID_VENTA);
            oci_bind_by_name($stmt, ':P_ID_VENTA', $ID_VENTA);
            oci_bind_by_name($stmt, ':P_ID_PRODUCTO', $ID_PRODUCTO);
            oci_bind_by_name($stmt, ':P_CANTIDAD', $CANTIDAD);
            oci_bind_by_name($stmt, ':P_SUBTOTAL', $SUBTOTAL);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en ActualizarDetalleVentaModel: " . $e->getMessage());
            return false;
        }
    }  

    function EliminarVENTAModel($id_venta) {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN PKG_DETALLE_VENTA.SP_ELIMINAR_DETALLE_VENTA(:P_ID_DETALLE); END;";
            $stmt = oci_parse($enlace, $sql);

            oci_bind_by_name($stmt, ':P_ID_DETALLE', $id_venta, -1, SQLT_INT);

            $resultado = oci_execute($stmt);

            if ($resultado) {
                return true;
            } else {
                return false;
            }

            oci_free_statement($stmt);
            oci_close($enlace);
        } catch (Exception $e) {
            error_log("Error al eliminar Detalle Venta: " . $e->getMessage());
            return false;
        }
    }

    function ConsultarUsuariosModel() {
        try {

            $enlace = AbrirBD();

            $sentencia = "BEGIN SP_OBTENER_USUARIOS_CS(:cursor); END;";
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

    function ConsultarProductosModel() {
        try {

            $enlace = AbrirBD();

            $sentencia = "BEGIN PKG_PRODUCTOS.SP_OBTENER_PRODUCTOS_CS(:cursor); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);

            oci_execute($cursor);

            $productos = [];

            while ($row = oci_fetch_assoc($cursor)) {
                $productos[] = $row;
            }

            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
            return $productos;

        } catch (Exception $ex) {
            error_log("Error en ConsultarProductosModel: " . $ex->getMessage());
            return null;
        }
    }

    function ConsultarVentasModel() {
        try {

            $enlace = AbrirBD();

            $sentencia = "BEGIN PKG_VENTA.SP_OBTENER_VENTAS_CS(:cursor); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);

            oci_execute($cursor);

            $ventas = [];

            while ($row = oci_fetch_assoc($cursor)) {
                $ventas[] = $row;
            }

            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
            return $ventas;

        } catch (Exception $ex) {
            error_log("Error en ConsultarVentasModel: " . $ex->getMessage());
            return null;
        }
    }
?>