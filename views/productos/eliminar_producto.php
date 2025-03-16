<?php
include_once "../../Model/ProductosModel.php";
$productos = ProductosModel::ConsultarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🗑️ Eliminar Producto - Bigotitos</title>
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
            <div class="card-header bg-danger text-white text-center">
                <h4 class="card-title">🗑️ Eliminar Producto</h4>
            </div>
            <div class="card-body">
                <form action="../Controller/ProductosController.php" method="POST">
                    <!-- Seleccionar Producto -->
                    <div class="mb-3">
                        <label class="form-label">Seleccionar Producto:</label>
                        <select name="txtIDProducto" class="form-select" required>
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?= $producto['ID_PRODUCTO'] ?>"><?= htmlspecialchars($producto['PRODUCTO']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Botón de envío -->
                    <div class="d-grid">
                        <button type="submit" name="btnEliminarProducto" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Eliminar Producto
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