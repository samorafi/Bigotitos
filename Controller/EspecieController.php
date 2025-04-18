<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/EspecieModel.php";

// Obtener todas las especies
function ConsultarEspecies() {
    $resultado = ConsultarEspeciesModel();

    if ($resultado !== null && !empty($resultado)) {
        return $resultado;
    }
    return [];
}

// Obtener especie por ID
function ConsultarEspecie($id_especie) {
    $resultado = ConsultarEspecieModel($id_especie);

    if ($resultado !== null && !empty($resultado)) {
        return $resultado;
    }
}

// Actualizar especie
if (isset($_POST["btnActualizarEspecie"])) {
    $id_especie = $_POST['txtIdEspecie'];
    $nombre     = $_POST['txtNombre'];

    $resultado = ActualizarEspecieModel($id_especie, $nombre);

    if ($resultado == true) {
        header('location: ../especies/especies.php');
        exit();
    } else {
        $_SESSION["mensaje"] = "No fue posible actualizar la especie.";
    }
}

// Insertar especie
if (isset($_POST["btnIngresarEspecie"])) {
    $nombre = $_POST['txtNombre'];

    $resultado = IngresarEspecieModel($nombre);

    if ($resultado == true) {
        header('location: ../especies/especies.php');
        exit();
    } else {
        $_SESSION["mensaje"] = "No fue posible ingresar la especie.";
    }
}

// Eliminar especie (cambio de estado)
if (isset($_POST['btnEliminarEspecie'])) {
    $id_especie = $_POST['txtIdEspecie'];
    
    $resultado = EliminarEspecieModel($id_especie);

    if ($resultado == true) {
        $_SESSION['mensaje'] = "Especie eliminada correctamente.";
        header('location: ../especies/especies.php');
        exit();
    } else {
        $_SESSION['mensaje'] = "No fue posible eliminar la especie.";
    }
}
?>