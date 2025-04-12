<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

    function ConsultarProductosModel() {
        try {

            $enlace = AbrirBD();

            $sentencia = "BEGIN SP_OBTENER_PRODUCTOS_CS(:cursor); END;";
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

    function ConsultarProductoModel($id_producto) {
        try {
            $enlace = AbrirBD();

            $sentencia = "BEGIN SP_OBTENER_PRODUCTO_CS(:P_ID_PRODUCTO, :P_CURSOR); END;";
            $stmt = oci_parse($enlace, $sentencia);

            $cursor = oci_new_cursor($enlace);

            oci_bind_by_name($stmt, ':P_ID_PRODUCTO', $id_producto, -1, SQLT_INT);
            oci_bind_by_name($stmt, ':P_CURSOR', $cursor, -1, OCI_B_CURSOR);

            oci_execute($stmt);
    
            oci_execute($cursor);
    
            $producto = null;
            if ($row = oci_fetch_assoc($cursor)) {
                $producto = [
                    'ID_PRODUCTO' => $id_producto,
                    'NOMBRE' => $row['NOMBRE'],
                    'DESCRIPCION' => $row['DESCRIPCION'],
                    'PRECIO' => $row['PRECIO'],
                    'EXISTENCIAS' => $row['EXISTENCIAS'],
                    'ID_CATEGORIA' => $row['ID_CATEGORIA'],
                    'NOMBRECATEGORIA' => $row['CATEGORIA'],
                    'ID_ESPECIE' => $row['ID_ESPECIE'],
                    'NOMBREESPECIE' => $row['ESPECIE'],
                    'ID_PROVEEDOR' => $row['ID_PROVEEDOR'],
                    'NOMBREPROVEEDOR' => $row['PROVEEDOR']
                ];
            }
    
            oci_free_statement($stmt);
            oci_free_statement($cursor);
            oci_close($enlace);
    
            return $producto;
    
        } catch (Exception $e) {
            error_log("Error en ConsultarProductoModel: " . $e->getMessage());
            return null;
        }
    }
      
    function IngresarProductoModel($NOMBRE, $DESCRIPCION, $PRECIO, $EXISTENCIAS, $CATEGORIA, $ESPECIE, $PROVEEDOR){
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN SP_INSERTAR_PRODUCTO(:P_NOMBRE, :P_DESCRIPCION,:P_PRECIO, :P_EXISTENCIAS, :P_CATEGORIA, :P_ESPECIE, :P_PROVEEDOR); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_NOMBRE', $NOMBRE);
            oci_bind_by_name($stmt, ':P_DESCRIPCION', $DESCRIPCION);
            oci_bind_by_name($stmt, ':P_PRECIO', $PRECIO);
            oci_bind_by_name($stmt, ':P_EXISTENCIAS', $EXISTENCIAS);
            oci_bind_by_name($stmt, ':P_CATEGORIA', $CATEGORIA);
            oci_bind_by_name($stmt, ':P_ESPECIE', $ESPECIE);
            oci_bind_by_name($stmt, ':P_PROVEEDOR', $PROVEEDOR);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en IngresarProductoModel: " . $e->getMessage());
            return false;
        }
    }

    function ActualizarProductoModel($ID_PRODUCTO, $NOMBRE, $DESCRIPCION, $PRECIO, $EXISTENCIAS, $CATEGORIA, $ESPECIE, $PROVEEDOR) {
        try {
            $enlace = AbrirBD();
    
            $sql = 'BEGIN SP_ACTUALIZAR_Producto(:P_ID_PRODUCTO, :P_NOMBRE, :P_DESCRIPCION, :P_PRECIO, :P_EXISTENCIAS, :P_CATEGORIA, :P_ESPECIE, :P_PROVEEDOR); END;';
            $stmt = oci_parse($enlace, $sql);
    
            oci_bind_by_name($stmt, ':P_ID_PRODUCTO', $ID_PRODUCTO);
            oci_bind_by_name($stmt, ':P_NOMBRE', $NOMBRE);
            oci_bind_by_name($stmt, ':P_DESCRIPCION', $DESCRIPCION);
            oci_bind_by_name($stmt, ':P_PRECIO', $PRECIO);
            oci_bind_by_name($stmt, ':P_EXISTENCIAS', $EXISTENCIAS);
            oci_bind_by_name($stmt, ':P_CATEGORIA', $CATEGORIA);
            oci_bind_by_name($stmt, ':P_ESPECIE', $ESPECIE);
            oci_bind_by_name($stmt, ':P_PROVEEDOR', $PROVEEDOR);
    
            $ejecutado = oci_execute($stmt);
    
            if ($ejecutado) {
                oci_free_statement($stmt);
                oci_close($enlace);
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento.");
            }
    
        } catch (Exception $e) {
            error_log("Error en ActualizarProductoModel: " . $e->getMessage());
            return false;
        }
    }  

    function EliminarProductoModel($id_Producto) {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN SP_ELIMINAR_Producto(:V_ID_Producto); END;";
            $stmt = oci_parse($enlace, $sql);

            oci_bind_by_name($stmt, ':V_ID_Producto', $id_Producto, -1, SQLT_INT);

            $resultado = oci_execute($stmt);

            if ($resultado) {
                return true;
            } else {
                return false;
            }

            oci_free_statement($stmt);
            oci_close($enlace);
        } catch (Exception $e) {
            error_log("Error al eliminar Producto: " . $e->getMessage());
            return false;
        }
    }

    function ConsultarCategoriasModel() {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN SP_OBTENER_CATEGORIAS_CS(:P_CURSOR); END;";
 
            $stmt = oci_parse($enlace, $sql);
            $cursor = oci_new_cursor($enlace);
            oci_bind_by_name($stmt, ":P_CURSOR", $cursor, -1, OCI_B_CURSOR);
 
            oci_execute($stmt);
 
            oci_execute($cursor);
 
            $categorias = [];
            while ($row = oci_fetch_assoc($cursor)) {
                $categorias[] = $row;
            }
 
            oci_free_statement($stmt);
            oci_free_cursor($cursor);
            oci_close($enlace);
 
            return $categorias;
        } catch (Exception $e) {
            error_log("Error al obtener categorias: " . $e->getMessage());
            return false;
        }
    }
 
    function ConsultarEspeciesModel() {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN SP_OBTENER_ESPECIES_CS(:P_CURSOR); END;";
 
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
            error_log("Error al obtener especies: " . $e->getMessage());
            return false;
        }
    }
 
    function ConsultarProveedoresModel() {
        try {
            $enlace = AbrirBD();
            $sql = "BEGIN SP_OBTENER_PROVEEDORES_CS(:P_CURSOR); END;";
 
            $stmt = oci_parse($enlace, $sql);
            $cursor = oci_new_cursor($enlace);
            oci_bind_by_name($stmt, ":P_CURSOR", $cursor, -1, OCI_B_CURSOR);
 
            oci_execute($stmt);
 
            oci_execute($cursor);
 
            $proveedores = [];
            while ($row = oci_fetch_assoc($cursor)) {
                $proveedores[] = $row;
            }
 
            oci_free_statement($stmt);
            oci_free_cursor($cursor);
            oci_close($enlace);
 
            return $proveedores;
        } catch (Exception $e) {
            error_log("Error al obtener proveedores: " . $e->getMessage());
            return false;
        }
    }

?>