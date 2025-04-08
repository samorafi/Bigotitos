<?php
include_once "../../Model/VentasModel.php";
include_once "../../Model/ClientesModel.php";

$ventas = VentasModel::ConsultarVentas();
$clientes = ClientesModel::ConsultarClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✏️ Actualizar Venta - Bigotitos</title>
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
                        <a class="nav-link active" href="ventas.php">💰 Ventas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-white text-center">
                <h4 class="card-title">✏️ Actualizar Venta</h4>
            </div>
            <div class="card-body">
                <form action="../../Controller/VentasController.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Seleccionar Venta:</label>
                        <select name="txtIDVenta" class="form-select" required>
                            <?php foreach ($ventas as $venta): ?>
                                <option value="<?= $venta['ID_VENTA'] ?>"><?= htmlspecialchars($venta['ID_VENTA']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Seleccionar Cliente:</label>
                        <select name="txtIDCliente" class="form-select" required>
                            <?php foreach ($clientes as $cliente): ?>
                                <option value="<?= $cliente['ID_CLIENTE'] ?>"><?= htmlspecialchars($cliente['NOMBRE']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nueva Fecha de Venta:</label>
                        <input type="date" name="txtFechaVenta" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nuevo Total:</label>
                        <input type="number" step="0.01" name="txtTotal" class="form-control" placeholder="Ingrese el nuevo total" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="btnActualizarVenta" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i> Actualizar Venta
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="ventas.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>