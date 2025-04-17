<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/VentasModel.php";

    function ConsultarVentas() {
        $resultado = ConsultarVentasModel();

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

    function ConsultarVenta($id_Venta) {
        $resultado = ConsultarVentaModel($id_Venta);

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
    }

    if (isset($_POST["btnActualizarVenta"])) {
        $ID_Venta = $_POST['txtIdVenta'];
        $ID_CLIENTE= $_POST['txtIdCliente'];
        $FECHA_VENTA = $_POST['txtFechaVenta'];
        $TOTAL = $_POST['txtTotal'];
       
        $resultado = ActualizarVentaModel($ID_Venta, $ID_CLIENTE, $FECHA_VENTA, $TOTAL);
    
        if ($resultado == true) {
            header('location: ../Ventas/Ventas.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el Venta.";
        }
    }

    if (isset($_POST["btnIngresarVenta"])) {
        $ID_CLIENTE= $_POST['txtIdCliente'];
        $FECHA_VENTA = $_POST['txtFechaVenta'];
        $TOTAL = $_POST['txtTotal'];
       
        $resultado = IngresarVentaModel($ID_CLIENTE, $FECHA_VENTA, $TOTAL);
    
        if ($resultado == true) {
            header('location: ../Ventas/Ventas.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el Venta.";
        }
    }

    if (isset($_POST['btnEliminarVenta'])) {
        $id_Venta = $_POST['txtIdVenta'];
        
        $resultado = EliminarVentaModel($id_Venta);

        if ($resultado == true) {
            $_SESSION['mensaje'] = "Venta eliminado correctamente.";
            header('location: ../Ventas/Ventas.php');
            exit();
        } else {
            $_SESSION['mensaje'] = "No fue posible eliminar el Venta.";
        }
    }

    function ConsultarClientes() {
        $resultado = ConsultarClientesModel();
 
        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

?>