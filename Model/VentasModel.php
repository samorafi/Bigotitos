<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

    function ConsultarVentasModel() {
        try {

            $enlace = AbrirBD();

            $sentencia = "BEGIN SP_OBTENER_VENTAS_CS(:cursor); END;";
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

    function ConsultarVentaModel($id_venta) {
        try {
            $enlace = AbrirBD();

            $sentencia = "BEGIN SP_OBTENER_VENTA_CS(:P_ID_VENTA, :P_CURSOR); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ':P_ID_VENTA', $id_venta, -1, SQLT_INT);
            oci_bind_by_name($stmt, ':P_CURSOR', $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);
    
            oci_execute($cursor);
    
            $VENTA = null;
            if ($row = oci_fetch_assoc($cursor)) {
                $VENTA = [
                    'ID_VENTA' => $id_venta,
                    'ID_CLIENTE' => $row['ID_CLIENTE'],
                    'NOMBRECLIENTE' => $row['CLIENTE'],
                    'FECHA_VENTA' => $row['FECHA_VENTA'],
                    'TOTAL' => $row['TOTAL'],
                    'ID_ESTADO' => $row['ID_ESTADO'],
                    'ESTADO' => $row['ESTADO']
                ];
            }
    
            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
    
            return $VENTA;
    
        } catch (Exception $e) {
            error_log("Error en ConsultarVentaModel: " . $e->getMessage());
            return null;
        }
    }
      
    function IngresarVentaModel($ID_CLIENTE, $FECHA_VENTA, $TOTAL){
        try {
            $enlace = AbrirBD();
    
            $FECHA_VENTA = date('Y-m-d', strtotime($FECHA_VENTA));
    
            $sql = 'BEGIN SP_INSERTAR_VENTA(:P_ID_CLIENTE, :P_FECHA_VENTA,:P_TOTAL); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_ID_CLIENTE', $ID_CLIENTE);
            oci_bind_by_name($stmt, ':P_FECHA_VENTA', $FECHA_VENTA);
            oci_bind_by_name($stmt, ':P_TOTAL', $TOTAL);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en IngresarVENTAModel: " . $e->getMessage());
            return false;
        }
    }
    

    function ActualizarVentaModel($ID_VENTA, $ID_CLIENTE, $FECHA_VENTA, $TOTAL) {
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN SP_ACTUALIZAR_VENTA(:P_ID_VENTA, :P_ID_CLIENTE, :P_FECHA_VENTA, :P_TOTAL); END;';
            $stmt = oci_parse($enlace, $sql);
            
            oci_bind_by_name($stmt, ':P_ID_VENTA', $ID_VENTA);
            oci_bind_by_name($stmt, ':P_ID_CLIENTE', $ID_CLIENTE);
            oci_bind_by_name($stmt, ':P_FECHA_VENTA', $FECHA_VENTA);
            oci_bind_by_name($stmt, ':P_TOTAL', $TOTAL);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en ActualizarVENTAModel: " . $e->getMessage());
            return false;
        }
    }  

    function EliminarVENTAModel($id_venta) {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN SP_ELIMINAR_VENTA(:V_ID_VENTA); END;";
            $stmt = oci_parse($enlace, $sql);

            oci_bind_by_name($stmt, ':V_ID_VENTA', $id_venta, -1, SQLT_INT);

            $resultado = oci_execute($stmt);

            if ($resultado) {
                return true;
            } else {
                return false;
            }

            oci_free_statement($stmt);
            oci_close($enlace);
        } catch (Exception $e) {
            error_log("Error al eliminar VENTA: " . $e->getMessage());
            return false;
        }
    }

    function ConsultarClientesModel() {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN SP_OBTENER_CLIENTES_CS(:P_CURSOR); END;";
 
            $stmt = oci_parse($enlace, $sql);
            $cursor = oci_new_cursor($enlace);
            oci_bind_by_name($stmt, ":P_CURSOR", $cursor, -1, OCI_B_CURSOR);
 
            oci_execute($stmt);
 
            oci_execute($cursor);
 
            $especies = [];
            while ($row = oci_fetch_assoc($cursor)) {
                $especies[] = $row;
            }
 
            oci_free_statement($stmt);
            oci_free_cursor($cursor);
            oci_close($enlace);
 
            return $especies;
        } catch (Exception $e) {
            error_log("Error al obtener clientes: " . $e->getMessage());
            return false;
        }
    }
?>