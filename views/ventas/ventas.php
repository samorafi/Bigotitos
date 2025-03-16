<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💰 Gestión de Ventas - Bigotitos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        .card {
            min-height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
        <h1 class="text-center mb-4">💰 Gestión de Ventas</h1>

        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-plus-circle display-4 text-success"></i>
                        <h5 class="card-title mt-3">Insertar Venta</h5>
                        <p class="card-text">Agrega nuevas ventas.</p>
                        <a href="insertar_venta.php" class="btn btn-success">➕ Insertar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-pencil-square display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Actualizar Venta</h5>
                        <p class="card-text">Modifica la información de las ventas.</p>
                        <a href="actualizar_venta.php" class="btn btn-warning">✏️ Actualizar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-trash display-4 text-danger"></i>
                        <h5 class="card-title mt-3">Eliminar Venta</h5>
                        <p class="card-text">Elimina ventas existentes.</p>
                        <a href="eliminar_venta.php" class="btn btn-danger">🗑️ Eliminar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-search display-4 text-info"></i>
                        <h5 class="card-title mt-3">Consultar Venta</h5>
                        <p class="card-text">Busca y visualiza información de ventas.</p>
                        <a href="consultar_venta.php" class="btn btn-info">📋 Consultar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>