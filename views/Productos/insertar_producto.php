<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/ProductosController.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }
        .form-title {
            color: #1a73e8;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #1a73e8;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #1558b0;
        }
    </style>
</head>
<body>

<div class="container form-container">
    <h2 class="text-center form-title">➕ Ingresar Producto</h2>
    <?php if (isset($_SESSION["mensaje"])): ?>
        <div class="alert alert-warning text-center" style="color: #000; background-color: #fff3cd; border-color: #ffeeba;">
            <?php echo $_SESSION["mensaje"]; ?>
        </div>
    <?php unset($_SESSION["mensaje"]);?>
    <?php endif; ?>
    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Existencias</label>
            <input type="number" class="form-control" id="txtExistencias" name="txtExistencias" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select class="form-control" id="txtCategoria" name="txtCategoria" required>
                <option value="">Seleccione una Categoria</option>
                <?php
                $categorias = ConsultarCategorias(); 
                foreach ($categorias as $categoria) {
                    echo '<option value="' . $categoria['ID_CATEGORIA'] . '" ' . ($datos && $datos['ID_CATEGORIA'] == $categoria['ID_CATEGORIA'] ? 'selected' : '') . '>';
                    echo htmlspecialchars($categoria['NOMBRE']);
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Especies</label>
            <select class="form-control" id="txtEspecie" name="txtEspecie" required>
                <option value="">Seleccione un Especies</option>
                <?php
                $especies = ConsultarEspecies(); 
                foreach ($especies as $especie) {
                    echo '<option value="' . $especie['ID_ESPECIE'] . '" ' . ($datos && $datos['ID_ESPECIE'] == $especie['ID_ESPECIE'] ? 'selected' : '') . '>';
                    echo htmlspecialchars($especie['NOMBRE']);
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Proveedores</label>
            <select class="form-control" id="txtProveedor" name="txtProveedor" required>
                <option value="">Seleccione un Proveedor</option>
                <?php
                $proveedores = ConsultarProveedores(); 
                foreach ($proveedores as $proveedor) {
                    echo '<option value="' . $proveedor['ID_PROVEEDOR'] . '" ' . ($datos && $datos['ID_PROVEEDOR'] == $proveedor['ID_PROVEEDOR'] ? 'selected' : '') . '>';
                    echo htmlspecialchars($proveedor['NOMBRE']);
                    echo '</option>';
                }
                ?>
            </select>
        </div>

        <div class="text-center mt-4">
            <input type="submit" class="btn btn-custom w-100 py-2" value="Ingresar Información" id="btnIngresarProducto" name="btnIngresarProducto">
        </div>
        <div class="text-center mt-3">
            <a href="../Productos/Productos.php" class="btn btn-secondary w-100 py-2">Regresar</a>
        </div>
    </form>
</div>

</body>
</html>
