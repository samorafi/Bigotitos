<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/DetalleVentaController.php';
$id_Detalle =  $_GET["id"];
$datos = ConsultarDetalleVenta($id_Detalle);
if (!$datos) {
    echo "<div class='alert alert-danger'>No se encontró información de la venta con ID: $id_Detalle</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Detalle Ventas</title>
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
    <h2 class="text-center form-title">✏️ Actualizar Detalle Ventas</h2>
    <?php if (isset($_SESSION["mensaje"])): ?>
        <div class="alert alert-warning text-center" style="color: #000; background-color: #fff3cd; border-color: #ffeeba;">
            <?php echo $_SESSION["mensaje"]; ?>
        </div>
    <?php unset($_SESSION["mensaje"]);?>
    <?php endif; ?>
    <form action="" method="POST">
        <input type="hidden" id="txtIdDetalle" name="txtIdDetalle" value="<?php echo $datos["ID_DETALLE"] ?>">

        <div class="mb-3">
            <label class="form-label">ID Venta</label>
            <select class="form-control" id="txtIdVenta" name="txtIdVenta" required>
                <option value="">Seleccione ID de Venta</option>
                <?php
                $id_ventas = ConsultarVentas(); 
                foreach ($id_ventas as $id_venta) {
                    echo '<option value="' . $id_venta['ID_VENTA'] . '" ' . ($datos && $datos['ID_VENTA'] == $id_venta['ID_VENTA'] ? 'selected' : '') . '>';
                    echo htmlspecialchars($id_venta['ID_VENTA']);
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Producto</label>
            <select class="form-control" id="txtIdProducto" name="txtIdProducto" required>
                <option value="">Seleccione un Producto</option>
                <?php
                $productos = ConsultarProductos(); 
                foreach ($productos as $producto) {
                    echo '<option value="' . $producto['ID_PRODUCTO'] . '" ' . ($datos && $datos['ID_PRODUCTO'] == $producto['ID_PRODUCTO'] ? 'selected' : '') . '>';
                    echo htmlspecialchars($producto['NOMBRE']);
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="txtCantidad" name="txtCantidad" required 
            value="<?= $datos ? htmlspecialchars($datos['CANTIDAD']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Subtotal</label>
            <input type="number" class="form-control" id="txtSubtotal" name="txtSubtotal" required 
            value="<?= $datos ? htmlspecialchars($datos['SUBTOTAL']) : '' ?>">
        </div>
        <div class="text-center mt-4">
            <input type="submit" class="btn btn-custom w-100 py-2" value="Actualizar Información" id="btnActualizarDetalleVenta" name="btnActualizarDetalleVenta">
        </div>
        <div class="text-center mt-3">
            <a href="../detalle_venta/detalle_ventas.php" class="btn btn-secondary w-100 py-2">Regresar</a>
        </div>
    </form>
</div>

</body>
</html>
