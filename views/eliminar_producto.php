<?php
include_once "../Model/ProductosModel.php";
$productos = ProductosModel::ConsultarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Eliminar Producto</title>
</head>
<body>

<h2>🗑️ Eliminar Producto</h2>

<form action="../Controller/ProductosController.php" method="POST">
    <label>Seleccionar Producto:</label>
    <select name="txtIDProducto">
        <?php foreach ($productos as $producto): ?>
            <option value="<?= $producto['ID_PRODUCTO'] ?>"><?= $producto['PRODUCTO'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit" name="btnEliminarProducto">Eliminar</button>
</form>

</body>
</html>
