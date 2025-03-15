<?php
include_once "../Controller/ProductosController.php"; // Ajustar ruta si es necesario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <!-- Agregar Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Agregar el archivo de estilos -->
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">📦 Gestión de Productos</h1>

        <?php if(isset($_SESSION["Message"])) { ?>
            <div class="alert alert-warning text-center">
                <?php echo $_SESSION["Message"]; unset($_SESSION["Message"]); ?>
            </div>
        <?php } ?>

        <!-- Formulario para Agregar Producto -->
        <form action="" method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label>ID Producto</label>
                    <input type="number" class="form-control" name="txtIDProducto" required>
                </div>
                <div class="col-md-6">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="txtNombre" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label>Descripción</label>
                    <input type="text" class="form-control" name="txtDescripcion" required>
                </div>
                <div class="col-md-6">
                    <label>Precio</label>
                    <input type="number" step="0.01" class="form-control" name="txtPrecio" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label>Existencias</label>
                    <input type="number" class="form-control" name="txtExistencias" required>
                </div>
                <div class="col-md-4">
                    <label>ID Categoría</label>
                    <input type="number" class="form-control" name="txtIDCategoria" required>
                </div>
                <div class="col-md-4">
                    <label>ID Especie</label>
                    <input type="number" class="form-control" name="txtIDEspecie" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label>ID Proveedor</label>
                    <input type="number" class="form-control" name="txtIDProveedor" required>
                </div>
            </div>

            <div class="mt-4 text-center">
                <input type="submit" class="btn btn-success" name="btnInsertarProducto" value="Insertar Producto">
                <input type="submit" class="btn btn-danger" name="btnEliminarProducto" value="Eliminar Producto">
            </div>
        </form>

        <!-- Volver al Inicio -->
        <div class="text-center">
            <a href="../index.php" class="btn btn-primary">🏠 Volver al Inicio</a>
        </div>

    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
