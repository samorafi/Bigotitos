<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/ProveedoresModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 📌 Insertar Proveedor
    if (isset($_POST["btnAgregarProveedor"])) {
        $nombre = $_POST["txtNombre"];
        $telefono = $_POST["txtTelefono"];
        $correo = $_POST["txtCorreo"];
        
        if (ProveedoresModel::InsertarProveedor(null, $nombre, $telefono, $correo)) {
            echo "<script>alert('✅ Proveedor agregado correctamente.'); window.location.href='../views/proveedores/proveedores.php';</script>";
        } else {
            echo "<script>alert('❌ Error al insertar proveedor. " . ProveedoresModel::InsertarProveedor(null, $nombre, $telefono, $correo) . "');</script>";
        }
    }
        
    // 📌 Actualizar Proveedor
    if (isset($_POST["btnActualizarProveedor"])) {
        $id = $_POST["txtIDProveedor"];
        $nombre = $_POST["txtNombre"];
        $telefono = $_POST["txtTelefono"];
        $correo = $_POST["txtCorreo"];
        
        if (ProveedoresModel::ActualizarProveedor($id, $nombre, $telefono, $correo)) {
            echo "<script>alert('✅ Proveedor actualizado correctamente.'); window.location.href='../Views/proveedores/proveedores.php';</script>";
        } else {
            echo "<script>alert('❌ Error al actualizar proveedor.'); window.location.href='../Views/proveedores/proveedores.php';</script>";
        }
    }

    // 📌 Eliminar Proveedor
    if (isset($_POST["btnEliminarProveedor"])) {
        $id = $_POST["txtIDProveedor"];
        
        if (ProveedoresModel::EliminarProveedor($id)) {
            echo "<script>alert('✅ Proveedor eliminado correctamente.'); window.location.href='../Views/proveedores/proveedores.php';</script>";
        } else {
            echo "<script>alert('❌ Error al eliminar proveedor.'); window.location.href='../Views/proveedores/proveedores.php';</script>";
        }
    }
}

//MODIFICAR CODIGO
/* 🔹 Consultar proveedores
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["listarProveedores"])) {
    $proveedores = ProveedoresModel::ConsultarProveedores();
    echo json_encode($proveedores);
}*/
?>