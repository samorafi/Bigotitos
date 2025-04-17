<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/ProductosController.php';
$datos = ConsultarProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">👤 Gestión de Productos</h1>


    <!-- Tabla -->
    <div class="table-responsive">
        <div class="mb-4 text-left">
            <a href="insertar_Producto.php" class="btn btn-success me-2">➕ Insertar</a>
            <a href="../../index.php" class="btn btn-secondary me-2">Regresar</a>

        </div>
        <?php
                      if (!empty($datos)) {
                          echo '<table ID="example" class="table table-striped">';
                          echo '<thead>';
                          echo '<tr>';
                          echo '<th>Nombre</th>';
                          echo '<th>Descripcion</th>';
                          echo '<th>Precio</th>';
                          echo '<th>Existencias</th>';
                          echo '<th>Categoria</th>';
                          echo '<th>Especie</th>';
                          echo '<th>Proveedor</th>';
                          echo '<th>Estado</th>';
                          echo '<th>Acciones</th>';
                          echo '</tr>';
                          echo '</thead>';
                          echo '<tbody>';

                          foreach ($datos as $dato) {
                              echo '<tr>';
                              echo '<td>' . htmlspecialchars($dato['NOMBRE']) . '</td>';
                              echo '<td>' . htmlspecialchars($dato['DESCRIPCION']) . '</td>';
                              echo '<td>' . htmlspecialchars($dato['PRECIO']) . '</td>';
                              echo '<td>' . htmlspecialchars($dato['EXISTENCIAS']) . '</td>';
                              echo '<td>' . htmlspecialchars($dato['CATEGORIA']) . '</td>';
                              echo '<td>' . htmlspecialchars($dato['ESPECIE']) . '</td>';
                              echo '<td>' . htmlspecialchars($dato['PROVEEDOR']) . '</td>';
                              echo '<td>' . htmlspecialchars($dato['ESTADO']) . '</td>';
                              echo '<td>';
                              echo '<div class="btn-group">';
                              echo '<a href="actualizar_Producto.php?id=' . $dato['ID_PRODUCTO'] . '" class="btn btn-warning btn-sm me-2">Editar</a>';
                              echo '<a href="eliminar_Producto.php?id=' . $dato['ID_PRODUCTO'] . '" class="btn btn-danger btn-sm">Eliminar</a>';
                              echo '</div>';                              
                              echo '</td>';                                                           
                              echo '</tr>';
                          }

                          echo '</tbody>';
                          echo '</table>';
                      } else {
                          echo '<p>No se encontraron Productos.</p>';
                      }
                      ?>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Tu JS personalizado -->
<script src="../../js/Datatable.js"></script>
</body>
</html>
