<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/ProductosController.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigotitos - Inicio</title>
    <!-- Agregar Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Agregar el archivo de estilos -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">🐾 Bienvenido a Bigotitos 🐾</h1>
    <form action="View/productos.php" method="GET" class="my-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Buscar productos..." required>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Productos</h5>
                    <p class="card-text">Administra los productos de la tienda.</p>
                    <a href="Views/productos.php" class="btn btn-success">Ir a Productos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Clientes</h5>
                    <p class="card-text">Administra los Clientes de la tienda.</p>
                    <a href="Views/Clientes/Clientes.php" class="btn btn-success">Ir a Clientes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Empleados</h5>
                    <p class="card-text">Administra los Empleados de la tienda.</p>
                    <a href="Views/Empleados/Empleados.php" class="btn btn-success">Ir a Empleados</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Usuarios</h5>
                    <p class="card-text">Administra los Usuarios de la tienda.</p>
                    <a href="Views/Usuarios/usuarios.php" class="btn btn-success">Ir a Usuarios</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
