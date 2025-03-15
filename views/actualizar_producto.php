<?php
include_once "../Model/ProductosModel.php";
$productos = ProductosModel::ConsultarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Producto</title>
</head>
<body>

<h2>✏️ Actualizar Producto</h2>

<form action="../Controller/ProductosController.php" method="POST">
    <label>Seleccionar Producto:</label>
    <select name="txtIDProducto">
        <?php foreach ($productos as $producto): ?>
            <option value="<?= $producto['ID_PRODUCTO'] ?>"><?= $producto['PRODUCTO'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="text" name="txtNombre" placeholder="Nuevo Nombre">
    <input type="text" name="txtDescripcion" placeholder="Nueva Descripción">
    <input type="number" step="0.01" name="txtPrecio" placeholder="Nuevo Precio">
    <input type="number" name="txtExistencias" placeholder="Nuevas Existencias">
    <button type="submit" name="btnActualizarProducto">Actualizar</button>
</form>

</body>
</html>
