<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/loginController.php";
session_start();
$error = $_SESSION['login_error'] ?? null;
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigotitos — Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">🐾 Bigotitos</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Iniciar Sesión</h3>

                        <?php if ($error): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input
                                    type="email"
                                    id="correo"
                                    name="correo"
                                    class="form-control"
                                    placeholder="tucorreo@ejemplo.com"
                                    required
                                    value="<?= isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : '' ?>"
                                >
                            </div>
                            <div class="mb-4">
                                <label for="contrasenna" class="form-label">Contraseña</label>
                                <input
                                    type="password"
                                    id="contrasenna"
                                    name="contrasenna"
                                    class="form-control"
                                    placeholder="••••••••"
                                    required
                                >
                            </div>
                            <button type="submit" name="btnLogin" class="btn btn-primary w-100">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
