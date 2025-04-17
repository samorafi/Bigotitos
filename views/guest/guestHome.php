<?php


session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['user_tipo'] ?? '') !== 'CLIENTE') {
    header('Location: ../login/login.php');
    exit();
}

include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/ProductosController.php';
$datos = ConsultarProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bigotitos — Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="guestHome.php">🐾 Bigotitos</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <span class="nav-link disabled">
                        <i class="bi bi-person-circle me-1"></i>
                        <?= htmlspecialchars($_SESSION['user_nombre']) ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../Controller/loginController.php?logout=1">
                        <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center mb-4">Productos Disponibles</h1>
    <div class="table-responsive">
        <?php if (!empty($datos)): ?>
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Categoría</th>
                        <th>Especie</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $dato): ?>
                        <tr>
                            <td><?= htmlspecialchars($dato['NOMBRE']) ?></td>
                            <td><?= htmlspecialchars($dato['DESCRIPCION']) ?></td>
                            <td><?= htmlspecialchars($dato['PRECIO']) ?></td>
                            <td><?= htmlspecialchars($dato['EXISTENCIAS']) ?></td>
                            <td><?= htmlspecialchars($dato['CATEGORIA']) ?></td>
                            <td><?= htmlspecialchars($dato['ESPECIE']) ?></td>
                            <td><?= htmlspecialchars($dato['PROVEEDOR']) ?></td>
                            <td><?= htmlspecialchars($dato['ESTADO']) ?></td>
                            <td><form action="../../Controller/cartController.php" method="POST">
                                    <input type="hidden" name="id_producto" value="<?= $dato['ID_PRODUCTO'] ?>">
                                    <button type="submit" name="btnAgregarCarrito" class="btn btn-sm btn-success" <?= $dato['EXISTENCIAS'] < 1 ? 'disabled' : '' ?>>Comprar 🛒</button>
                                </form></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">No hay productos disponibles en este momento.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="../../js/Datatable.js"></script>
</body>
</html>
