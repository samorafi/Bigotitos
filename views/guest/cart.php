<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['user_tipo'] ?? '') !== 'CLIENTE') {
    header('Location: login.php');
    exit();
}
$cart         = $_SESSION['cart'] ?? [];
$error        = $_SESSION['cart_error']   ?? '';
$success      = $_SESSION['cart_success'] ?? '';
unset($_SESSION['cart_error'], $_SESSION['cart_success']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrito de Compras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="guestHome.php">🐾 Bigotitos</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="guestHome.php">← Seguir comprando</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../Controller/loginController.php?logout=1">Cerrar sesión</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="mb-4">Tu Carrito</h2>

  <?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php elseif ($success): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <?php if (empty($cart)): ?>
    <p>No tienes productos en el carrito.</p>
  <?php else: ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Subtotal</th>
          <th>Quitar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $total = 0;
          foreach ($cart as $item):
            $subtotal = $item['precio'] * $item['cantidad'];
            $total += $subtotal;
        ?>
          <tr>
            <td><?= htmlspecialchars($item['nombre']) ?></td>
            <td><?= number_format($item['precio'],2) ?></td>
            <td><?= $item['cantidad'] ?></td>
            <td><?= number_format($subtotal,2) ?></td>
            <td>
              <form action="../../Controller/cartController.php" method="POST">
                <input type="hidden" name="id_producto" value="<?= $item['id'] ?>">
                <button type="submit" name="btnQuitarCarrito" class="btn btn-sm btn-danger">✖</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <th colspan="3" class="text-end">Total:</th>
          <th><?= number_format($total,2) ?></th>
          <th></th>
        </tr>
      </tbody>
    </table>

    <form action="../../Controller/cartController.php" method="POST">
      <button type="submit" name="btnProcesarCompra" class="btn btn-success">
        <i class="bi bi-credit-card"></i> Pagar <?= number_format($total,2) ?>
      </button>
    </form>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
