<?php
include_once "../Model/ProductosModel.php";

// Obtener el próximo ID de producto
$id_producto = ProductosModel::ObtenerProximoID();
$categorias = ProductosModel::ObtenerCategorias();
$especies = ProductosModel::ObtenerEspecies();
$proveedores = ProductosModel::ObtenerProveedores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Producto</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">➕ Insertar Producto</h2>

    <form action="../Controller/ProductosController.php" method="POST">
        <input type="hidden" name="txtIDProducto" value="<?= $id_producto ?>">

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="txtNombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <input type="text" name="txtDescripcion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio:</label>
            <input type="number" step="0.01" name="txtPrecio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Existencias:</label>
            <input type="number" name="txtExistencias" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría:</label>
            <select name="txtIDCategoria" class="form-control" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['ID_CATEGORIA'] ?>"><?= $categoria['NOMBRE'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Especie:</label>
            <select name="txtIDEspecie" class="form-control" required>
                <?php foreach ($especies as $especie): ?>
                    <option value="<?= $especie['ID_ESPECIE'] ?>"><?= $especie['NOMBRE'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Proveedor:</label>
            <select name="txtIDProveedor" class="form-control" required>
                <?php foreach ($proveedores as $proveedor): ?>
                    <option value="<?= $proveedor['ID_PROVEEDOR'] ?>"><?= $proveedor['NOMBRE'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" name="btnAgregarProducto" class="btn btn-success btn-block">Agregar Producto</button>
    </form>

    <div class="text-center mt-3">
        <a href="productos.php" class="btn btn-secondary">⬅ Volver</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
