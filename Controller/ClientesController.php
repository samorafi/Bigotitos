<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/ClientesModel.php";

    function ConsultarClientes() {
        $resultado = ConsultarClientesModel();

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

    function ConsultarCliente($id_cliente) {
        $resultado = ConsultarClienteModel($id_cliente);

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
    }

    if (isset($_POST["btnActualizarCliente"])) {
        $id_cliente = $_POST['txtIdCliente'];
        $id_usuario = $_POST['txtUsuario'];
        $direccion = $_POST['txtDireccion'];

       
        $resultado = ActualizarClienteModel($id_cliente, $id_usuario, $direccion);
    
        if ($resultado == true) {
            header('location: ../Clientes/Clientes.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el Cliente.";
        }
    }

    if (isset($_POST["btnIngresarCliente"])) {
        $id_usuario = $_POST['txtUsuario'];
        $direccion = $_POST['txtdireccion'];
       
        $resultado = IngresarClienteModel($id_usuario, $direccion);
    
        if ($resultado == true) {
            header('location: ../Clientes/Clientes.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible ingresar el Cliente.";
        }
    }

    if (isset($_POST['btnEliminarCliente'])) {
        $id_cliente = $_POST['txtIdCliente'];
        
        $resultado = EliminarClienteModel($id_cliente);

        if ($resultado == true) {
            $_SESSION['mensaje'] = "Cliente eliminado correctamente.";
            header('location: ../Clientes/Clientes.php');
            exit();
        } else {
            $_SESSION['mensaje'] = "No fue posible eliminar el Cliente.";
        }
    }
?>