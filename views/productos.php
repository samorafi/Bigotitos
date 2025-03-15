<?php
include_once "../Controller/ProductosController.php";
$productos = ProductosModel::ObtenerStockProductos();
$auditoria = ProductosModel::ObtenerAuditoriaProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<div class="container">
    <h1 class="text-center">📦 Gestión de Productos</h1>

    <!-- Mostrar Productos desde la VISTA -->
    <h3>Stock de Productos</h3>
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
                    <td><?= $producto["PRODUCTO"]; ?></td>
                    <td><?= $producto["PROVEEDOR"]; ?></td>
                    <td><?= $producto["EXISTENCIAS"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Auditoría de Productos -->
    <h3>Registro de Auditoría</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Operación</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($auditoria as $log): ?>
                <tr>
                    <td><?= $log["ID_PRODUCTO"]; ?></td>
                    <td><?= $log["NOMBRE"]; ?></td>
                    <td><?= $log["OPERACION"]; ?></td>
                    <td><?= $log["FECHA_MODIFICACION"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
