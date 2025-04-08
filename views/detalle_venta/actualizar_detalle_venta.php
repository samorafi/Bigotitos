<?php
include_once "../../Model/DetalleVentaModel.php";
include_once "../../Model/VentasModel.php";
include_once "../../Model/ProductosModel.php";

$detalles = DetalleVentaModel::ConsultarDetalleVentas();
$ventas = VentasModel::ConsultarVentas();
$productos = ProductosModel::ConsultarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✏️ Actualizar Detalle de Venta - Bigotitos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <style>
        .card {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

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
                        <a class="nav-link active" href="detalle_venta.php">🧾 Detalle de Ventas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-white text-center">
                <h4 class="card-title">✏️ Actualizar Detalle de Venta</h4>
            </div>
            <div class="card-body">
                <form action="../../Controller/DetalleVentaController.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Seleccionar Detalle de Venta:</label>
                        <select name="txtIDDetalle" class="form-select" required>
                            <?php foreach ($detalles as $detalle): ?>
                                <option value="<?= $detalle['ID_DETALLE'] ?>"><?= htmlspecialchars($detalle['ID_DETALLE']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Seleccionar Venta:</label>
                        <select name="txtIDVenta" class="form-select" required>
                            <?php foreach ($ventas as $venta): ?>
                                <option value="<?= $venta['ID_VENTA'] ?>"><?= htmlspecialchars($venta['ID_VENTA']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Seleccionar Producto:</label>
                        <select name="txtIDProducto" class="form-select" required>
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?= $producto['ID_PRODUCTO'] ?>"><?= htmlspecialchars($producto['NOMBRE']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad:</label>
                        <input type="number" name="txtCantidad" class="form-control" placeholder="Ingrese la cantidad" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subtotal:</label>
                        <input type="number" step="0.01" name="txtSubtotal" class="form-control" placeholder="Ingrese el subtotal" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="btnActualizarDetalleVenta" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i> Actualizar Detalle
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="detalle_venta.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>