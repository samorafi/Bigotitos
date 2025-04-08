<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/EmpleadosModel.php";

    function ConsultarEmpleados() {
        $resultado = ConsultarEmpleadosModel();

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

    function ConsultarEmpleado($id_empleado) {
        $resultado = ConsultarEmpleadoModel($id_empleado);

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
    }

    if (isset($_POST["btnActualizarEmpleado"])) {
        $id_empleado = $_POST['txtIdEmpleado'];
        $id_usuario = $_POST['txtUsuario'];
        $id_cargo = $_POST['txtCargo'];

       
        $resultado = ActualizarEmpleadoModel($id_empleado, $id_usuario, $id_cargo);
    
        if ($resultado == true) {
            header('location: ../Empleados/Empleados.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el Empleado.";
        }
    }

    if (isset($_POST["btnIngresarEmpleado"])) {
        $id_usuario = $_POST['txtUsuario'];
        $cargo = $_POST['txtCargo'];
       
        $resultado = IngresarEmpleadoModel($id_usuario, $cargo);
    
        if ($resultado == true) {
            header('location: ../Empleados/Empleados.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible ingresar el Empleado.";
        }
    }

    if (isset($_POST['btnEliminarEmpleado'])) {
        $id_empleado = $_POST['txtIdEmpleado'];
        
        $resultado = EliminarEmpleadoModel($id_empleado);

        if ($resultado == true) {
            $_SESSION['mensaje'] = "Empleado eliminado correctamente.";
            header('location: ../Empleados/Empleados.php');
            exit();
        } else {
            $_SESSION['mensaje'] = "No fue posible eliminar el Empleado.";
        }
    }
?>