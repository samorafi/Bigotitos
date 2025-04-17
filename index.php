<?php
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                    <a href="Views/Productos/productos.php" class="btn btn-success">Ir a Productos</a>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>