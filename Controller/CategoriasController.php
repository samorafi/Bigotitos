<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/CategoriasModel.php";

// Consultar todas las categorías
function ConsultarCategorias() {
    $resultado = ConsultarCategoriasModel();

    if ($resultado !== null && !empty($resultado)) {
        return $resultado;
    }
    return [];
}

// Consultar una categoría por ID
function ConsultarCategoria($id_categoria) {
    $resultado = ConsultarCategoriaModel($id_categoria);

    if ($resultado !== null && !empty($resultado)) {
        return $resultado;
    }
}

// Actualizar categoría
if (isset($_POST["btnActualizarCategoria"])) {
    $id_categoria = $_POST['txtIdCategoria'];
    $nombre       = $_POST['txtNombre'];

    $resultado = ActualizarCategoriaModel($id_categoria, $nombre);

    if ($resultado == true) {
        header('location: ../Categorias/Categorias.php');
        exit();
    } else {
        $_SESSION["mensaje"] = "No fue posible actualizar la categoría.";
    }
}

// Insertar categoría
if (isset($_POST["btnIngresarCategoria"])) {
    $nombre = $_POST['txtNombre'];

    $resultado = IngresarCategoriaModel($nombre);

    if ($resultado == true) {
        header('location: ../Categorias/Categorias.php');
        exit();
    } else {
        $_SESSION["mensaje"] = "No fue posible ingresar la categoría.";
    }
}

// Eliminar categoría (cambiar estado)
if (isset($_POST['btnEliminarCategoria'])) {
    $id_categoria = $_POST['txtIdCategoria'];

    $resultado = EliminarCategoriaModel($id_categoria);

    if ($resultado == true) {
        $_SESSION['mensaje'] = "Categoría eliminada correctamente.";
        header('location: ../Categorias/Categorias.php');
        exit();
    } else {
        $_SESSION['mensaje'] = "No fue posible eliminar la categoría.";
    }
}
?>