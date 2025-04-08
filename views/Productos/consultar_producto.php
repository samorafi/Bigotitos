<?php
include_once "../Model/ProductosModel.php";
$productos = ProductosModel::ConsultarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>📋 Consultar Productos</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">📋 Lista de Productos</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Proveedor</th>
                <th>Existencias</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= htmlspecialchars($producto["PRODUCTO"]); ?></td>
                    <td><?= htmlspecialchars($producto["PROVEEDOR"]); ?></td>
                    <td><?= htmlspecialchars($producto["EXISTENCIAS"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-center">
        <a href="productos.php" class="btn btn-primary">⬅ Volver</a>
    </div>
</div>

</body>
</html>
