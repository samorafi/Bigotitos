<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Controller/ProductosController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/VentasModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/DetalleVentaModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

function AgregarAlCarrito()
{
    $id = $_POST['id_producto'] ?? null;
    if (!$id) {
        header('Location: ../views/guest/guestHome.php');
        exit();
    }

    $producto = ConsultarProducto($id);
    if (!$producto) {
        $_SESSION['cart_error'] = "Producto no encontrado.";
        header('Location: ../views/guest/guestHome.php');
        exit();
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        if ($_SESSION['cart'][$id]['cantidad'] < (int)$producto['EXISTENCIAS']) {
            $_SESSION['cart'][$id]['cantidad']++;
        } else {
            $_SESSION['cart_error'] = "No hay más existencias disponibles.";
        }
    } else {
        $_SESSION['cart'][$id] = [
            'id'          => $producto['ID_PRODUCTO'],
            'nombre'      => $producto['NOMBRE'],
            'precio'      => (float)$producto['PRECIO'],
            'cantidad'    => 1,
            'existencias' => (int)$producto['EXISTENCIAS'],
        ];
    }

    header('Location: ../views/guest/cart.php');
    exit();
}

function QuitarDelCarrito()
{
    $id = $_POST['id_producto'] ?? null;
    if ($id && isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    header('Location: ../views/guest/cart.php');
    exit();
}

function MostrarCarrito()
{
    require $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/views/guest/cart.php";
}

function ProcesarCompra()
{
    $cart = $_SESSION['cart'] ?? [];
    if (empty($cart)) {
        $_SESSION['cart_error'] = "El carrito está vacío.";
        header('Location: ../views/guest/cart.php');
        exit();
    }

    $userId = $_SESSION['user_id'];
    $enlace = AbrirBD();
    $stmt   = oci_parse($enlace,
        "SELECT ID_CLIENTE 
           FROM CLIENTES 
          WHERE ID_USUARIO = :p_user"
    );
    oci_bind_by_name($stmt, ":p_user", $userId);
    oci_execute($stmt);
    $fila       = oci_fetch_assoc($stmt);
    oci_free_statement($stmt);
    if (!$fila || empty($fila['ID_CLIENTE'])) {
        CerrarBD($enlace);
        $_SESSION['cart_error'] = "No existe un registro de cliente para este usuario.";
        header('Location: ../views/guest/cart.php');
        exit();
    }
    $clienteId = $fila['ID_CLIENTE'];
    CerrarBD($enlace);

    $fecha = date('Y-m-d');
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    if (!IngresarVentaModel($clienteId, $fecha, $total)) {
        $_SESSION['cart_error'] = "Error al registrar la venta.";
        header('Location: ../views/guest/cart.php');
        exit();
    }

    $enlace = AbrirBD();
    $stmt   = oci_parse($enlace, "SELECT seq_ventas.CURRVAL AS ID_VENTA FROM DUAL");
    oci_execute($stmt);
    $row     = oci_fetch_assoc($stmt);
    oci_free_statement($stmt);
    CerrarBD($enlace);

    $idVenta = $row['ID_VENTA'] ?? null;
    if (!$idVenta) {
        $_SESSION['cart_error'] = "No se pudo obtener el ID de la venta.";
        header('Location: ../views/guest/cart.php');
        exit();
    }

    foreach ($cart as $item) {
        $subtotal = $item['precio'] * $item['cantidad'];
        if (!IngresarDetalleVentaModel($idVenta, $item['id'], $item['cantidad'], $subtotal)) {
            $_SESSION['cart_error'] = "Error al registrar el detalle de venta.";
            header('Location: ../views/guest/cart.php');
            exit();
        }
    }

    unset($_SESSION['cart']);
    $_SESSION['cart_success'] = "Compra realizada con éxito. ¡Gracias por tu preferencia!";
    header('Location: ../views/guest/cart.php');
    exit();
}

if (isset($_POST['btnAgregarCarrito'])) {
    AgregarAlCarrito();
} elseif (isset($_POST['btnQuitarCarrito'])) {
    QuitarDelCarrito();
} elseif (isset($_POST['btnProcesarCompra'])) {
    ProcesarCompra();
} else {
    MostrarCarrito();
}
