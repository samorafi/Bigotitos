<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/ProveedoresController.php';

$datos = ConsultarProveedores();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">📦 Gestión de Proveedores</h1>

    <div class="table-responsive">
        <div class="mb-4 text-left">
            <a href="insertar_Proveedor.php" class="btn btn-success me-2">➕ Insertar</a>
            <a href="../../index.php" class="btn btn-secondary me-2">Regresar</a>
        </div>
        <?php
        if (!empty($datos)) {
            echo '<table id="example" class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nombre</th>';
            echo '<th>Teléfono</th>';
            echo '<th>Correo</th>';
            echo '<th>Estado</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($datos as $dato) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($dato['ID_PROVEEDOR']) . '</td>';
                echo '<td>' . htmlspecialchars($dato['NOMBRE']) . '</td>';
                echo '<td>' . htmlspecialchars($dato['TELEFONO']) . '</td>';
                echo '<td>' . htmlspecialchars($dato['CORREO']) . '</td>';
                echo '<td>' . htmlspecialchars($dato['ESTADO']) . '</td>';
                echo '<td>';
                echo '<div class="btn-group">';
                echo '<a href="actualizar_Proveedor.php?id=' . $dato['ID_PROVEEDOR'] . '" class="btn btn-warning btn-sm me-2">Editar</a>';
                echo '<a href="eliminar_Proveedor.php?id=' . $dato['ID_PROVEEDOR'] . '" class="btn btn-danger btn-sm">Eliminar</a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No se encontraron proveedores.</p>';
        }
        ?>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- JS personalizado -->
<script src="../../js/Datatable.js"></script>
</body>
</html>
