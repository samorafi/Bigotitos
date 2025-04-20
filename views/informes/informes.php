<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/informeController.php";
$clientes = ObtenerDatosGraficoClientesPremium();
$stock    = ObtenerDatosStockProductos();
$resumen  = ObtenerResumenGeneral();

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
    <title>Informes — Bigotitos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../adminHome.php">🐾 Bigotitos</a>
        <a class="nav-link text-light ms-2" href="informes.php">📊 Informes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="../productos/productos.php">📦 Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="../proveedores/proveedores.php">🚚 Proveedores</a></li>
                <li class="nav-item"><a class="nav-link" href="../especies/especies.php">🐾 Especies</a></li>
                <li class="nav-item"><a class="nav-link" href="../categorias/categorias.php">🏷 Categorías</a></li>
                <li class="nav-item"><a class="nav-link" href="../usuarios/usuarios.php">👤 Usuarios</a></li>
                <li class="nav-item"><a class="nav-link" href="../empleados/empleados.php">👔 Empleados</a></li>
                <li class="nav-item"><a class="nav-link" href="../clientes/clientes.php">👥 Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="../ventas/ventas.php">💰 Ventas</a></li>
                <li class="nav-item"><a class="nav-link" href="../detalle_venta/detalle_ventas.php">🧾 Detalle Ventas</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item d-flex align-items-center ms-3">
                    <span class="nav-link disabled">
                        <i class="bi bi-person-circle me-1"></i>
                        <?= htmlspecialchars($_SESSION['user_nombre'] . ' ' . ($_SESSION['user_apellido'] ?? '')) ?>
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

<!-- PESTAÑAS -->
<div class="container mt-4">
    <ul class="nav nav-tabs" id="informeTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="resumen-tab" data-bs-toggle="tab" data-bs-target="#resumen" 
                    type="button" role="tab" aria-controls="resumen" aria-selected="true">
                Resumen General
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="premium-tab" data-bs-toggle="tab" data-bs-target="#premium" 
                    type="button" role="tab" aria-controls="premium" aria-selected="false">
                Clientes Premium
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="stock-tab" data-bs-toggle="tab" data-bs-target="#stock" 
                    type="button" role="tab" aria-controls="stock" aria-selected="false">
                Stock Productos
            </button>
        </li>
    </ul>

    <div class="tab-content p-3 border border-top-0" id="informeTabsContent">

        <!-- RESUMEN GENERAL -->
        <div class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">
            <h3 class="mb-4 text-center">📊 Información General </h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($resumen as $titulo => $valor): ?>
                    <div class="col">
                        <div class="card h-100 text-center shadow-sm border-info">
                            <div class="card-body">
                            <h6 class="card-title small"><?= htmlspecialchars($titulo) ?></h6>
                            <p class="card-text fs-5"><?= htmlspecialchars($valor) ?></p> 
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- CLIENTES PREMIUM -->
        <div class="tab-pane fade" id="premium" role="tabpanel" aria-labelledby="premium-tab">
            <h2>Clientes Premium - Total Gastado</h2>
            <canvas id="graficoClientes" width="600" height="300"></canvas>
        </div>

        <!-- STOCK PRODUCTOS -->
        <div class="tab-pane fade" id="stock" role="tabpanel" aria-labelledby="stock-tab">
            <h2>Stock de Productos</h2>
            <canvas id="graficoStock" width="600" height="300"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctxClientes = document.getElementById('graficoClientes').getContext('2d');
    const labelsClientes = <?php echo json_encode(array_column($clientes, 'NOMBRE_COMPLETO')); ?>;
    const dataClientes   = <?php echo json_encode(array_map('floatval', array_column($clientes, 'TOTAL_GASTADO'))); ?>;
    new Chart(ctxClientes, {
        type: 'bar',
        data: {
            labels: labelsClientes,
            datasets: [{
                label: 'Total Gastado (₡)',
                data: dataClientes,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    let graficoStock = null;
    document.getElementById('stock-tab').addEventListener('shown.bs.tab', function () {
        if (graficoStock) graficoStock.destroy();

        const ctxStock = document.getElementById('graficoStock').getContext('2d');
        const labelsStock = <?php echo json_encode(array_column($stock, 'PRODUCTO')); ?>;
        const dataStock   = <?php echo json_encode(array_map('intval', array_column($stock, 'EXISTENCIAS'))); ?>;

        graficoStock = new Chart(ctxStock, {
            type: 'bar',
            data: {
                labels: labelsStock,
                datasets: [{
                    label: 'Existencias',
                    data: dataStock,
                    backgroundColor: 'rgba(255, 205, 86, 0.6)',
                    borderColor: 'rgba(255, 205, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } }
            }
        });
    });
});
</script>
</body>
</html>