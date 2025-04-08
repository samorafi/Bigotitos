<?php
include_once "../../Model/ClientesModel.php";
include_once "../../Model/UsuariosModel.php";

$id_cliente = ClientesModel::ObtenerProximoID();
$usuarios = UsuariosModel::ConsultarUsuarios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Insertar Cliente - Bigotitos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <style>
        .card {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">🐾 Bigotitos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">🏠 Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="clientes.php">👤 Clientes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4 class="card-title">➕ Insertar Cliente</h4>
            </div>
            <div class="card-body">
                <form action="../../Controller/ClientesController.php" method="POST">
                    <input type="hidden" name="txtIDCliente" value="<?= $id_cliente ?>">

                    <div class="mb-3">
                        <label class="form-label">Seleccionar Usuario:</label>
                        <select name="txtIDUsuario" class="form-select" required>
                            <?php foreach ($usuarios as $usuario): ?>
                                <option value="<?= $usuario['ID_USUARIO'] ?>"><?= htmlspecialchars($usuario['NOMBRE']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dirección:</label>
                        <textarea name="txtDireccion" class="form-control" rows="3" placeholder="Ingrese la dirección" required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="btnAgregarCliente" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i> Agregar Cliente
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="clientes.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>