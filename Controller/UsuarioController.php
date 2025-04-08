<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/UsuarioModel.php";

    function ConsultarUsuarios() {
        $resultado = ConsultarUsuariosModel();

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

    function ConsultarUsuario($id_usuario) {
        $resultado = ConsultarUsuarioModel($id_usuario);

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
    }

    if (isset($_POST["btnActualizarUsuario"])) {
        $id_usuario = $_POST['txtIdUsuario'];
        $nombre = $_POST['txtNombre'];
        $apellido = $_POST['txtapellido'];
        $telefono = $_POST['txtTelefono'];
        $correo = $_POST['txtCorreo'];
       
        $resultado = ActualizarUsuarioModel($id_usuario, $nombre, $apellido, $telefono, $correo);
    
        if ($resultado == true) {
            header('location: ../Usuarios/Usuarios.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el usuario.";
        }
    }

    if (isset($_POST["btnIngresarUsuario"])) {
        $nombre = $_POST['txtNombre'];
        $apellido = $_POST['txtapellido'];
        $telefono = $_POST['txtTelefono'];
        $correo = $_POST['txtCorreo'];
        $contrasenna = $_POST['txtContrasenna'];
       
        $resultado = IngresarUsuarioModel($nombre, $apellido, $telefono, $correo, $contrasenna);
    
        if ($resultado == true) {
            header('location: ../Usuarios/Usuarios.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el usuario.";
        }
    }

    if (isset($_POST['btnEliminarUsuario'])) {
        $id_usuario = $_POST['txtIdUsuario'];
        
        $resultado = EliminarUsuarioModel($id_usuario);

        if ($resultado == true) {
            $_SESSION['mensaje'] = "Usuario eliminado correctamente.";
            header('location: ../Usuarios/Usuarios.php');
            exit();
        } else {
            $_SESSION['mensaje'] = "No fue posible eliminar el usuario.";
        }
    }

?>