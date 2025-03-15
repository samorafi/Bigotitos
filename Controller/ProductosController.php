<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/ProductosModel.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 📌 Insertar un producto
if (isset($_POST["btnInsertarProducto"])) {
    $id_producto = $_POST["txtIDProducto"];
    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $precio = number_format($_POST["txtPrecio"], 2, '.', '');
    $existencias = $_POST["txtExistencias"];
    $id_categoria = $_POST["txtIDCategoria"];
    $id_especie = $_POST["txtIDEspecie"];
    $id_proveedor = $_POST["txtIDProveedor"];

    $resultado = ProductosModel::InsertarProducto($id_producto, $nombre, $descripcion, $precio, $existencias, $id_categoria, $id_especie, $id_proveedor);

    if ($resultado) {
        header('location: ../View/productos.php');
    } else {
        $_SESSION["Message"] = "Error al registrar el producto.";
    }
}
?>
