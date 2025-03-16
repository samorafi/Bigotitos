<?php
include_once "../../Model/ProductosModel.php";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Insertar Producto - Bigotitos</title>
    <!-- Agregar Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Agregar Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Agregar estilos personalizados -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        .card {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">🐾 Bigotitos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">🏠 Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="productos.php">📦 Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4 class="card-title">➕ Insertar Producto</h4>
            </div>
            <div class="card-body">
                <form action="../Controller/ProductosController.php" method="POST">
                    <input type="hidden" name="txtIDProducto" value="<?= $id_producto ?>">

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="txtNombre" class="form-control" required>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label class="form-label">Descripción:</label>
                        <textarea name="txtDescripcion" class="form-control" rows="3" required></textarea>
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label class="form-label">Precio:</label>
                        <input type="number" step="0.01" name="txtPrecio" class="form-control" required>
                    </div>

                    <!-- Existencias -->
                    <div class="mb-3">
                        <label class="form-label">Existencias:</label>
                        <input type="number" name="txtExistencias" class="form-control" required>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-3">
                        <label class="form-label">Categoría:</label>
                        <select name="txtIDCategoria" class="form-select" required>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria['ID_CATEGORIA'] ?>"><?= $categoria['NOMBRE'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Especie -->
                    <div class="mb-3">
                        <label class="form-label">Especie:</label>
                        <select name="txtIDEspecie" class="form-select" required>
                            <?php foreach ($especies as $especie): ?>
                                <option value="<?= $especie['ID_ESPECIE'] ?>"><?= $especie['NOMBRE'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Proveedor -->
                    <div class="mb-3">
                        <label class="form-label">Proveedor:</label>
                        <select name="txtIDProveedor" class="form-select" required>
                            <?php foreach ($proveedores as $proveedor): ?>
                                <option value="<?= $proveedor['ID_PROVEEDOR'] ?>"><?= $proveedor['NOMBRE'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Botón de envío -->
                    <div class="d-grid">
                        <button type="submit" name="btnAgregarProducto" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i> Agregar Producto
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="productos.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>