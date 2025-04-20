<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/loginController.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Usuario</title>
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
    <h2 class="text-center form-title">➕ Registrar Usuario</h2>
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
            <label class="form-label">Apellido</label>
            <input type="text" class="form-control" id="txtapellido" name="txtapellido" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="txtTelefono" name="txtTelefono" pattern="[0-9]{8,15}" required>
            <small class="form-text text-muted">Ingrese solo números (8-15 dígitos).</small>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="txtContrasenna" name="txtContrasenna" required>
        </div>

        <div class="text-center mt-4">
            <input type="submit" class="btn btn-custom w-100 py-2" value="Ingresar Información" id="btnRegistrarUsuario" name="btnRegistrarUsuario">
        </div>
        
    </form>
</div>

</body>
</html>
