<?php
// Incluye los controladores necesarios
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/ProductosController.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/ProveedoresController.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/EspeciesController.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/CategoriasController.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/UsuariosController.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/EmpleadosController.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/ClientesController.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/VentasController.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/DetalleVentaController.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bigotitos - Inicio</title>
    <!-- Agregar Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Agregar Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Agregar el archivo de estilos -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">🐾 Bigotitos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="views/productos/productos.php">📦 Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="views/proveedores/proveedores.php">🚚 Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="views/especies/especies.php">🐾 Especies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="views/categorias/categorias.php">🏷️ Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="views/usuarios/usuarios.php">👤 Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="views/empleados/empleados.php">👔 Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="views/clientes/clientes.php">👤 Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="views/ventas/ventas.php">💰 Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="views/detalle_venta/detalle_ventas.php">🧾 Detalle de Ventas</a>
                    </li>                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">🐾 Bienvenido a Bigotitos 🐾</h1>

        <!-- Barra de Búsqueda -->
        <form action="View/productos/productos.php" method="GET" class="my-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar productos..." required>
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>

        <!-- Tarjetas para la gestión de cada tabla -->
        <div class="row">
            <!-- Gestión de Productos -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-box-seam display-4 text-success"></i>
                        <h5 class="card-title mt-3">Gestión de Productos</h5>
                        <p class="card-text">Administra los productos de la tienda.</p>
                        <a href="Views/productos/productos.php" class="btn btn-success">Ir a Productos</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Proveedores -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-truck display-4 text-primary"></i>
                        <h5 class="card-title mt-3">Gestión de Proveedores</h5>
                        <p class="card-text">Administra los proveedores de la tienda.</p>
                        <a href="Views/proveedores/proveedores.php" class="btn btn-success">Ir a Proveedores</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Especies -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-heart display-4 text-danger"></i>
                        <h5 class="card-title mt-3">Gestión de Especies</h5>
                        <p class="card-text">Administra las especies de mascotas.</p>
                        <a href="Views/especies/especies.php" class="btn btn-success">Ir a Especies</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Categorías -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-tags display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Gestión de Categorías</h5>
                        <p class="card-text">Administra las categorías de productos.</p>
                        <a href="Views/categorias/categorias.php" class="btn btn-success">Ir a Categorías</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Usuarios -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-people display-4 text-info"></i>
                        <h5 class="card-title mt-3">Gestión de Usuarios</h5>
                        <p class="card-text">Administra los usuarios del sistema.</p>
                        <a href="Views/usuarios/usuarios.php" class="btn btn-success">Ir a Usuarios</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Empleados -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-person-badge display-4 text-secondary"></i>
                        <h5 class="card-title mt-3">Gestión de Empleados</h5>
                        <p class="card-text">Administra los empleados de la tienda.</p>
                        <a href="Views/empleados/empleados.php" class="btn btn-success">Ir a Empleados</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Clientes -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-person-circle display-4 text-success"></i>
                        <h5 class="card-title mt-3">Gestión de Clientes</h5>
                        <p class="card-text">Administra los clientes de la tienda.</p>
                        <a href="Views/clientes/clientes.php" class="btn btn-success">Ir a Clientes</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Ventas -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-cash-coin display-4 text-primary"></i>
                        <h5 class="card-title mt-3">Gestión de Ventas</h5>
                        <p class="card-text">Administra las ventas realizadas.</p>
                        <a href="Views/ventas/ventas.php" class="btn btn-success">Ir a Ventas</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Detalle de Ventas -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-receipt display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Gestión de Detalle de Ventas</h5>
                        <p class="card-text">Administra los detalles de las ventas.</p>
                        <a href="Views/detalle_venta/detalle_ventas.php" class="btn btn-success">Ir a Detalle de
                            Ventas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>