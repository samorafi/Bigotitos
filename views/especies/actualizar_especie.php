<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Bigotitos/Controller/EspecieController.php';

$id_especie = $_GET["id"];
$datos = ConsultarEspecie($id_especie);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Especie</title>
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
    <h2 class="text-center form-title">✏️ Actualizar Especie</h2>

    <?php if (isset($_SESSION["mensaje"])): ?>
        <div class="alert alert-warning text-center" style="color: #000; background-color: #fff3cd; border-color: #ffeeba;">
            <?php echo $_SESSION["mensaje"]; ?>
        </div>
        <?php unset($_SESSION["mensaje"]); ?>
    <?php endif; ?>

    <form action="" method="POST">
        <input type="hidden" id="txtIdEspecie" name="txtIdEspecie" value="<?php echo $datos["ID_ESPECIE"]; ?>">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" required 
                   value="<?= $datos ? htmlspecialchars($datos['NOMBRE']) : '' ?>">
        </div>

        <div class="text-center mt-4">
            <input type="submit" class="btn btn-custom w-100 py-2" value="Actualizar Información" id="btnActualizarEspecie" name="btnActualizarEspecie">
        </div>

        <div class="text-center mt-3">
            <a href="../Especie/Especie.php" class="btn btn-secondary w-100 py-2">Regresar</a>
        </div>
    </form>
</div>

</body>
</html>