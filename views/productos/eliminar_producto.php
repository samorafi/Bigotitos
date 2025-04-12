<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/ProductosController.php';
$id_Producto =  $_GET["id"];
$datos = ConsultarProducto($id_Producto);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
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
    <h2 class="text-center form-title">🗑️ Eliminar Producto</h2>
    <?php if (isset($_SESSION["mensaje"])): ?>
        <div class="alert alert-warning text-center" style="color: #000; background-color: #fff3cd; border-color: #ffeeba;">
            <?php echo $_SESSION["mensaje"]; ?>
        </div>
    <?php unset($_SESSION["mensaje"]);?>
    <?php endif; ?>
    <form action="" method="POST">
        <input type="hidden" id="txtIdProducto" name="txtIdProducto" value="<?php echo $datos["ID_PRODUCTO"] ?>">
        
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" readonly
            value="<?= $datos ? htmlspecialchars($datos['NOMBRE']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" readonly 
            value="<?= $datos ? htmlspecialchars($datos['DESCRIPCION']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" pattern="[0-9]{8,15}" readonly
            value="<?= $datos ? htmlspecialchars($datos['PRECIO']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Existencias</label>
            <input type="number" class="form-control" id="txtExistencias" name="txtExistencias" readonly 
            value="<?= $datos ? htmlspecialchars($datos['EXISTENCIAS']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <input type="text" class="form-control" id="txtCategoria" name="txtCategoria" readonly 
            value="<?= $datos ? htmlspecialchars($datos['NOMBRECATEGORIA']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Proveedor</label>
            <input type="text" class="form-control" id="txtProveedor" name="txtProveedor" readonly 
            value="<?= $datos ? htmlspecialchars($datos['NOMBREPROVEEDOR']) : '' ?>">
        </div>

        <div class="text-center mt-4">
            <input type="submit" class="btn btn-custom w-100 py-2" value="Eliminar Información" id="btnEliminarProducto" name="btnEliminarProducto">
        </div>
        <div class="text-center mt-3">
            <a href="../Productos/Productos.php" class="btn btn-secondary w-100 py-2">Regresar</a>
        </div>
    </form>
</div>

</body>
</html>
