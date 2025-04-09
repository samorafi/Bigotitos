<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/EmpleadoController.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/UsuarioController.php';
$id_empleado =  $_GET["id"];
$datos = ConsultarEmpleado($id_empleado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario</title>
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
    <h2 class="text-center form-title">✏️ Actualizar Usuario</h2>
    <?php if (isset($_SESSION["mensaje"])): ?>
        <div class="alert alert-warning text-center" style="color: #000; background-color: #fff3cd; border-color: #ffeeba;">
            <?php echo $_SESSION["mensaje"]; ?>
        </div>
    <?php unset($_SESSION["mensaje"]);?>
    <?php endif; ?>
    <form action="" method="POST">
        <input type="hidden" id="txtIdEmpleado" name="txtIdEmpleado" value="<?php echo $datos["ID_EMPLEADO"] ?>">
        
        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <select class="form-control" id="txtUsuario" name="txtUsuario" required>
                <option value="">Seleccione un Usuario</option>
                <?php
                $usuarios = ConsultarUsuarios(); 
                foreach ($usuarios as $usuario) {
                    echo '<option value="' . $usuario['ID_USUARIO'] . '" ' . ($datos && $datos['ID_USUARIO'] == $usuario['ID_USUARIO'] ? 'selected' : '') . '>';
                    echo htmlspecialchars($usuario['NOMBRE']) . ' ' . htmlspecialchars($usuario['APELLIDO']);
                    echo '</option>';
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cargo</label>
            <input type="text" class="form-control" id="txtCargo" name="txtCargo" required 
            value="<?= $datos ? htmlspecialchars($datos['CARGO']) : '' ?>">
        </div>

        <div class="text-center mt-4">
            <input type="submit" class="btn btn-custom w-100 py-2" value="Actualizar Información" id="btnActualizarEmpleado" name="btnActualizarEmpleado">
        </div>
        <div class="text-center mt-3">
            <a href="../Empleados/Empleados.php" class="btn btn-secondary w-100 py-2">Regresar</a>
        </div>
    </form>
</div>

</body>
</html>
