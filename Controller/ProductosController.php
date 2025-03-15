<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/ProductosModel.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 📌 Insertar Producto
    if (isset($_POST["btnAgregarProducto"])) {
        $id = ProductosModel::ObtenerProximoID();
        $nombre = $_POST["txtNombre"];
        $descripcion = $_POST["txtDescripcion"];
        $precio = number_format($_POST["txtPrecio"], 2, '.', '');
        $existencias = $_POST["txtExistencias"];
        $categoria = $_POST["txtIDCategoria"];
        $especie = $_POST["txtIDEspecie"];
        $proveedor = $_POST["txtIDProveedor"];

        if (ProductosModel::InsertarProducto($id, $nombre, $descripcion, $precio, $existencias, $categoria, $especie, $proveedor)) {
            header('location: ../View/productos.php');
        } else {
            echo "❌ Error al insertar producto.";
        }
    }

    // 📌 Actualizar Producto
    if (isset($_POST["btnActualizarProducto"])) {
        $id = $_POST["txtIDProducto"];
        $nombre = $_POST["txtNombre"];
        $descripcion = $_POST["txtDescripcion"];
        $precio = number_format($_POST["txtPrecio"], 2, '.', '');
        $existencias = $_POST["txtExistencias"];
        $categoria = $_POST["txtIDCategoria"];
        $especie = $_POST["txtIDEspecie"];
        $proveedor = $_POST["txtIDProveedor"];

        if (ProductosModel::ActualizarProducto($id, $nombre, $descripcion, $precio, $existencias, $categoria, $especie, $proveedor)) {
            header('location: ../View/productos.php');
        } else {
            echo "❌ Error al actualizar producto.";
        }
    }

    // 📌 Eliminar Producto
    if (isset($_POST["btnEliminarProducto"])) {
        $id = $_POST["txtIDProducto"];

        if (ProductosModel::EliminarProducto($id)) {
            header('location: ../View/productos.php');
        } else {
            echo "❌ Error al eliminar producto.";
        }
    }
}
?>
