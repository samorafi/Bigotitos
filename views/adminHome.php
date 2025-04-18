<?php

session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['user_tipo'] ?? '') !== 'EMPLEADO') {
    header('Location: ../login/login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigotitos - Panel Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="adminHome.php">🐾 Bigotitos</a>
            <a class="nav-link text-light ms-2" href="../views/informes/informes.php">📊 Informes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="../views/productos/productos.php">📦 Productos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../views/proveedores/proveedores.php">🚚
                            Proveedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/especies/especies.php">🐾 Especies</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/categorias/categorias.php">🏷️
                            Categorías</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/usuarios/usuarios.php">👤 Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/empleados/empleados.php">👔 Empleados</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../views/clientes/clientes.php">👥 Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/ventas/ventas.php">💰 Ventas</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/detalle_venta/detalle_ventas.php">🧾 Detalle Ventas</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item d-flex align-items-center ms-3">
                        <span class="nav-link disabled">
                            <i class="bi bi-person-circle me-1"></i>
                            <?= htmlspecialchars($_SESSION['user_nombre'] . ' ' . ($_SESSION['user_apellido'] ?? '')) ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Controller/loginController.php?logout=1">
                            <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <h1 class="text-center">🐾 Bienvenido a Bigotitos 🐾</h1>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-bag-check-fill display-4 text-primary"></i>
                        <h5 class="card-title">Gestión de Productos</h5>
                        <p class="card-text">Administra los productos de la tienda.</p>
                        <a href="../views/productos/productos.php" class="btn btn-success">Ir a Productos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-person-raised-hand display-4 text-warning"></i>
                        <h5 class="card-title">Gestión de Clientes</h5>
                        <p class="card-text">Administra los Clientes de la tienda.</p>
                        <a href="../views/clientes/clientes.php" class="btn btn-success">Ir a Clientes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-person-badge display-4 text-danger"></i>
                        <h5 class="card-title">Gestión de Empleados</h5>
                        <p class="card-text">Administra los Empleados de la tienda.</p>
                        <a href="../views/empleados/empleados.php" class="btn btn-success">Ir a Empleados</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-people-fill display-4 text-success"></i>
                        <h5 class="card-title">Gestión de Usuarios</h5>
                        <p class="card-text">Administra los Usuarios de la tienda.</p>
                        <a href="../views/usuarios/usuarios.php" class="btn btn-success">Ir a Usuarios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-truck display-4 text-primary"></i>
                        <h5 class="card-title mt-3">Gestión de Proveedores</h5>
                        <p class="card-text">Administra los proveedores de la tienda.</p>
                        <a href="../views/proveedores/proveedores.php" class="btn btn-success">Ir a Proveedores</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-heart display-4 text-danger"></i>
                        <h5 class="card-title mt-3">Gestión de Especies</h5>
                        <p class="card-text">Administra las especies de mascotas.</p>
                        <a href="../views/especies/especies.php" class="btn btn-success">Ir a Especies</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-tags display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Gestión de Categorías</h5>
                        <p class="card-text">Administra las categorías de productos.</p>
                        <a href="../views/categorias/categorias.php" class="btn btn-success">Ir a Categorías</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-cash-coin display-4 text-primary"></i>
                        <h5 class="card-title mt-3">Gestión de Ventas</h5>
                        <p class="card-text">Administra las ventas realizadas.</p>
                        <a href="../views/ventas/ventas.php" class="btn btn-success">Ir a Ventas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <i class="bi bi-receipt display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Gestión de Detalle de Ventas</h5>
                        <p class="card-text">Administra los detalles de las ventas.</p>
                        <a href="../views/detalle_venta/detalle_ventas.php" class="btn btn-success">Ir a Detalle
                            Ventas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>