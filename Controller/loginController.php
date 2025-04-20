<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/LoginModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/UsuarioModel.php";

function MostrarLogin()
{
    require $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/views/login.php";
}

if (isset($_POST["btnLogin"])) {
    $correo      = $_POST['correo']      ?? '';
    $contrasenna = $_POST['contrasenna'] ?? '';
    $user = IniciarSesionModel($correo, $contrasenna);

    if ($user) {
        session_start();
        $_SESSION['user_id']       = $user['id_usuario'];
        $_SESSION['user_nombre']   = $user['nombre'];
        $_SESSION['user_apellido'] = $user['apellido'];
        $_SESSION['user_estado']   = $user['id_estado'];
        $_SESSION['user_tipo']     = $user['tipo_usuario'];

        if ($user['tipo_usuario'] === 'EMPLEADO') {
            header('Location: ../adminHome.php');
        } elseif ($user['tipo_usuario'] === 'CLIENTE') {
            header('Location: ../guest/guestHome.php');
        } else {
            session_destroy();
            session_start();
            $_SESSION["mensaje"] = "Tipo de usuario no válido.";
            header('Location: ../login/login.php');
        }
        exit();
    } else {
        session_start();
        $_SESSION["mensaje"] = "Correo o contraseña incorrectos.";
        header('Location: ../login/login.php');
        exit();
    }
}

if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    header('Location: ../views/login/login.php');
    exit();
}

if (isset($_POST["btnRegistrarUsuario"])) {
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtapellido'];
    $telefono = $_POST['txtTelefono'];
    $correo = $_POST['txtCorreo'];
    $contrasenna = $_POST['txtContrasenna'];
   
    $resultado = IngresarUsuarioModel($nombre, $apellido, $telefono, $correo, $contrasenna);

    if ($resultado == true) {
        header('location: ../login/login.php');
        exit();
    } else {
        $_SESSION["mensaje"] = "No fue posible registrar el usuario.";
    }
}

?>