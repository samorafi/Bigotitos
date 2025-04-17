<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/ProveedoresModel.php";

function ConsultarProveedores() {
    $resultado = ConsultarProveedoresModel();

    if ($resultado !== null && !empty($resultado)) {
        return $resultado;
    }
    return [];
}

function ConsultarProveedor($id_proveedor) {
    $resultado = ConsultarProveedorModel($id_proveedor);

    if ($resultado !== null && !empty($resultado)) {
        return $resultado;
    }
}

if (isset($_POST["btnActualizarProveedor"])) {
    $id_proveedor = $_POST['txtIdProveedor'];
    $nombre       = $_POST['txtNombre'];
    $telefono     = $_POST['txtTelefono'];
    $correo       = $_POST['txtCorreo'];

    $resultado = ActualizarProveedorModel($id_proveedor, $nombre, $telefono, $correo);

    if ($resultado == true) {
        header('location: ../Proveedores/Proveedores.php');
        exit();
    } else {
        $_SESSION["mensaje"] = "No fue posible actualizar el proveedor.";
    }
}

if (isset($_POST["btnIngresarProveedor"])) {
    $nombre   = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $correo   = $_POST['txtCorreo'];

    $resultado = IngresarProveedorModel($nombre, $telefono, $correo);

    if ($resultado == true) {
        header('location: ../Proveedores/Proveedores.php');
        exit();
    } else {
        $_SESSION["mensaje"] = "No fue posible ingresar el proveedor.";
    }
}

if (isset($_POST['btnEliminarProveedor'])) {
    $id_proveedor = $_POST['txtIdProveedor'];
    
    $resultado = EliminarProveedorModel($id_proveedor);

    if ($resultado == true) {
        $_SESSION['mensaje'] = "Proveedor eliminado correctamente.";
        header('location: ../Proveedores/Proveedores.php');
        exit();
    }else{
        $_SESSION["mensaje"] = "No fue posible ingresar el proveedor.";
    }
}
?>
