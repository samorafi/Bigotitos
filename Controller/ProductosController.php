<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/ProductosModel.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 📌 Agregar un Producto
if (isset($_POST["btnInsertarProducto"])) {
    $id_producto = $_POST["txtIDProducto"];
    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $precio = number_format($_POST["txtPrecio"], 2, '.', ''); // 🔍 Asegurar formato
    $existencias = $_POST["txtExistencias"];
    $id_categoria = $_POST["txtIDCategoria"];
    $id_especie = $_POST["txtIDEspecie"];
    $id_proveedor = $_POST["txtIDProveedor"];

    $resultado = ProductosModel::InsertarProducto($id_producto, $nombre, $descripcion, $precio, $existencias, $id_categoria, $id_especie, $id_proveedor);

    if ($resultado) {
        header('location: ../../View/productos.php');
    } else {
        $_SESSION["Message"] = "Error al registrar el producto.";
    }
}

// 📌 Eliminar un Producto
if (isset($_POST["btnEliminarProducto"])) {
    $id_producto = $_POST["txtIDProducto"];
    
    $resultado = ProductosModel::EliminarProducto($id_producto);
    
    if ($resultado) {
        header('location: ../../View/productos.php');
    } else {
        $_SESSION["Message"] = "Error al eliminar el producto.";
    }
}
?>
