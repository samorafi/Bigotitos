<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/DetalleVentaModel.php";

    function ConsultarDetalleVentas() {
        $resultado = ConsultarDetalleVentasModel();

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

    function ConsultarDetalleVenta($id_Detalle) {
        $resultado = ConsultarDetalleVentaModel($id_Detalle);

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
    }

    if (isset($_POST["btnActualizarDetalleVenta"])) {
        $id_Detalle = $_POST['txtIdDetalle'];
        $ID_VENTA= $_POST['txtIdVenta'];
        $ID_PRODUCTO = $_POST['txtIdProducto'];
        $CANTIDAD = $_POST['txtCantidad'];
        $SUBTOTAL = $_POST['txtSubtotal'];
       
        $resultado = ActualizarVentaModel($id_Detalle, $ID_VENTA, $ID_PRODUCTO, $CANTIDAD,$SUBTOTAL);
    
        if ($resultado == true) {
            header('location: ../detalle_venta/detalle_ventas.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el Venta.";
        }
    }

    if (isset($_POST["btnIngresarDetalleVenta"])) {
        $ID_VENTA= $_POST['txtIdVenta'];
        $ID_PRODUCTO = $_POST['txtIdProducto'];
        $CANTIDAD = $_POST['txtCantidad'];
        $SUBTOTAL = $_POST['txtSubtotal'];
       
        $resultado = IngresarVentaModel($ID_VENTA, $ID_PRODUCTO, $CANTIDAD,$SUBTOTAL);
    
        if ($resultado == true) {
            header('location: ../detalle_venta/detalle_ventas.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el Venta.";
        }
    }

    if (isset($_POST['btnEliminarDetalleVenta'])) {
        $id_Detalle = $_POST['txtIdDetalle'];
        
        $resultado = EliminarVentaModel($id_Detalle);

        if ($resultado == true) {
            $_SESSION['mensaje'] = "Venta eliminado correctamente.";
            header('location: ../detalle_venta/detalle_ventas.php');
            exit();
        } else {
            $_SESSION['mensaje'] = "No fue posible eliminar el Venta.";
        }
    }

    function ConsultarUsuarios() {
        $resultado = ConsultarUsuariosModel();
 
        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

    function ConsultarProductos() {
        $resultado = ConsultarProductosModel();
 
        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

    function ConsultarVentas() {
        $resultado = ConsultarVentasModel();
 
        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

?>