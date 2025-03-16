<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>👤 Gestión de Usuarios - Bigotitos</title>
    <!-- Agregar Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Agregar Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Agregar estilos personalizados -->
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
                        <a class="nav-link active" href="usuarios.php">👤 Usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container my-5">
        <h1 class="text-center mb-4">👤 Gestión de Usuarios</h1>

        <!-- Tarjetas de acciones -->
        <div class="row justify-content-center">
            <!-- Insertar Usuario -->
            <div class="col-md-3 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-plus-circle display-4 text-success"></i>
                        <h5 class="card-title mt-3">Insertar Usuario</h5>
                        <p class="card-text">Agrega nuevos usuarios.</p>
                        <a href="insertar_usuario.php" class="btn btn-success">➕ Insertar</a>
                    </div>
                </div>
            </div>

            <!-- Actualizar Usuario -->
            <div class="col-md-3 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-pencil-square display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Actualizar Usuario</h5>
                        <p class="card-text">Modifica la información de los usuarios.</p>
                        <a href="actualizar_usuario.php" class="btn btn-warning">✏️ Actualizar</a>
                    </div>
                </div>
            </div>

            <!-- Eliminar Usuario -->
            <div class="col-md-3 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-trash display-4 text-danger"></i>
                        <h5 class="card-title mt-3">Eliminar Usuario</h5>
                        <p class="card-text">Elimina usuarios existentes.</p>
                        <a href="eliminar_usuario.php" class="btn btn-danger">🗑️ Eliminar</a>
                    </div>
                </div>
            </div>

            <!-- Consultar Usuario -->
            <div class="col-md-3 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-search display-4 text-info"></i>
                        <h5 class="card-title mt-3">Consultar Usuario</h5>
                        <p class="card-text">Busca y visualiza información de usuarios.</p>
                        <a href="consultar_usuario.php" class="btn btn-info">📋 Consultar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>