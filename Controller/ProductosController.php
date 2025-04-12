<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/ProductosModel.php";

    function ConsultarProductos() {
        $resultado = ConsultarProductosModel();

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }

    function ConsultarProducto($id_producto) {
        $resultado = ConsultarProductoModel($id_producto);

        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
    }

    if (isset($_POST["btnActualizarProducto"])) {
        $ID_PRODUCTO = $_POST['txtIdProducto'];
        $NOMBRE= $_POST['txtNombre'];
        $DESCRIPCION = $_POST['txtDescripcion'];
        $PRECIO = $_POST['txtPrecio'];
        $EXISTENCIAS = $_POST['txtExistencias'];
        $CATEGORIA= $_POST['txtCategoria'];
        $ESPECIE= $_POST['txtEspecie'];
        $PROVEEDOR = $_POST['txtProveedor'];
       
        $resultado = ActualizarProductoModel($ID_PRODUCTO, $NOMBRE, $DESCRIPCION, $PRECIO, $EXISTENCIAS, $CATEGORIA, $ESPECIE, $PROVEEDOR);
    
        if ($resultado == true) {
            header('location: ../Productos/Productos.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el producto.";
        }
    }

    if (isset($_POST["btnIngresarProducto"])) {
        $NOMBRE= $_POST['txtNombre'];
        $DESCRIPCION = $_POST['txtDescripcion'];
        $PRECIO = $_POST['txtPrecio'];
        $EXISTENCIAS = $_POST['txtExistencias'];
        $CATEGORIA= $_POST['txtCategoria'];
        $ESPECIE= $_POST['txtEspecie'];
        $PROVEEDOR = $_POST['txtProveedor'];
       
        $resultado = IngresarProductoModel($NOMBRE, $DESCRIPCION, $PRECIO, $EXISTENCIAS, $CATEGORIA, $ESPECIE, $PROVEEDOR);
    
        if ($resultado == true) {
            header('location: ../Productos/Productos.php');
            exit();
        } else {
            $_SESSION["mensaje"] = "No fue posible actualizar el producto.";
        }
    }

    if (isset($_POST['btnEliminarProducto'])) {
        $id_producto = $_POST['txtIdProducto'];
        
        $resultado = EliminarProductoModel($id_producto);

        if ($resultado == true) {
            $_SESSION['mensaje'] = "Producto eliminado correctamente.";
            header('location: ../Productos/Productos.php');
            exit();
        } else {
            $_SESSION['mensaje'] = "No fue posible eliminar el producto.";
        }
    }

    function ConsultarCategorias() {
        $resultado = ConsultarCategoriasModel();
 
        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }
 
    function ConsultarEspecies() {
        $resultado = ConsultarEspeciesModel();
 
        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }
 
    function ConsultarProveedores() {
        $resultado = ConsultarProveedoresModel();
 
        if ($resultado !== null && !empty($resultado)) {
            return $resultado;
        }
        return [];
    }
 

?>