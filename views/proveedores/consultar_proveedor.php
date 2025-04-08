<?php
include_once "../../Model/ProveedoresModel.php";
$proveedores = ProveedoresModel::ConsultarProveedores();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📋 Consultar Proveedores - Bigotitos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <style>
        .card {
            max-width: 1000px;
            margin: 0 auto;
        }

        .table thead th {
            background-color: #198754;
            color: white;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">🐾 Bigotitos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">🏠 Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="proveedores.php">🚚 Proveedores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4 class="card-title">📋 Lista de Proveedores</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!is_array($proveedores)): ?>
                            <tr>
                                <td colspan="4" class="text-center text-danger">⚠️ Error inesperado al consultar
                                    proveedores.</td>
                            </tr>
                        <?php elseif (isset($proveedores['error'])): ?>
                            <tr>
                                <td colspan="4" class="text-center text-danger">⚠️ <?= $proveedores['error']; ?></td>
                            </tr>
                        <?php elseif (count($proveedores) > 0): ?>
                            <?php foreach ($proveedores as $proveedor): ?>
                                <tr>
                                    <td><?= htmlspecialchars($proveedor['ID_PROVEEDOR']); ?></td>
                                    <td><?= htmlspecialchars($proveedor['NOMBRE']); ?></td>
                                    <td><?= htmlspecialchars($proveedor['TELEFONO']); ?></td>
                                    <td><?= htmlspecialchars($proveedor['CORREO']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-danger">⚠️ No hay proveedores registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center">
                <a href="proveedores.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>