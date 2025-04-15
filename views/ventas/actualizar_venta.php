<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/VentasController.php';
$id_Venta =  $_GET["id"];
$datos = ConsultarVenta($id_Venta);
if (!$datos) {
    echo "<div class='alert alert-danger'>No se encontró información de la venta con ID: $id_Venta</div>";
}
?>
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Ventas</title>
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
    <h2 class="text-center form-title">✏️ Actualizar Ventas</h2>
    <?php if (isset($_SESSION["mensaje"])): ?>
        <div class="alert alert-warning text-center" style="color: #000; background-color: #fff3cd; border-color: #ffeeba;">
            <?php echo $_SESSION["mensaje"]; ?>
        </div>
    <?php unset($_SESSION["mensaje"]);?>
    <?php endif; ?>
    <form action="" method="POST">
        <input type="hidden" id="txtIdVenta" name="txtIdVenta" value="<?php echo $datos["ID_VENTA"] ?>">
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select class="form-control" id="txtIdCliente" name="txtIdCliente" required>
                <option value="">Seleccione un Cliente</option>
                <?php
                $clientes = ConsultarClientes(); 
                foreach ($clientes as $cliente) {
                    echo '<option value="' . $cliente['ID_CLIENTE'] . '" ' . ($datos && $datos['ID_CLIENTE'] == $cliente['ID_CLIENTE'] ? 'selected' : '') . '>';
                    echo htmlspecialchars($cliente['CLIENTE']);
                    echo '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Actual de la Venta</label>
            <input type="text" class="form-control" id="txtFechaVenta" name="txtFechaVenta" readonly 
            value="<?= $datos ? htmlspecialchars($datos['FECHA_VENTA']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" id="txtFechaVenta" name="txtFechaVenta" required 
            value="<?= $datos ? htmlspecialchars($datos['FECHA_VENTA']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="number" class="form-control" id="txtTotal" name="txtTotal" required
            value="<?= $datos ? htmlspecialchars($datos['TOTAL']) : '' ?>">
        </div>
        <div class="text-center mt-4">
            <input type="submit" class="btn btn-custom w-100 py-2" value="Actualizar Información" id="btnActualizarVenta" name="btnActualizarVenta">
        </div>
        <div class="text-center mt-3">
            <a href="../Ventas/Ventas.php" class="btn btn-secondary w-100 py-2">Regresar</a>
        </div>
    </form>
</div>

</body>
</html>
