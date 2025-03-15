<?php
require_once '../../models/ProductoModel.php';

$model = new ProductoModel();
$id = $_GET['id'];
$producto = $model->obtenerProducto($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="../../controllers/ProductoController.php?action=editar" method="POST">
        <input type="hidden" name="id" value="<?php echo $producto['ID_PRODUCTO']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $producto['NOMBRE']; ?>" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo $producto['DESCRIPCION']; ?></textarea>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" value="<?php echo $producto['PRECIO']; ?>" required>
        <br>
        <label for="existencias">Existencias:</label>
        <input type="number" id="existencias" name="existencias" value="<?php echo $producto['EXISTENCIAS']; ?>" required>
        <br>
        <label for="id_categoria">ID Categoría:</label>
        <input type="number" id="id_categoria" name="id_categoria" value="<?php echo $producto['ID_CATEGORIA']; ?>" required>
        <br>
        <label for="id_especie">ID Especie:</label>
        <input type="number" id="id_especie" name="id_especie" value="<?php echo $producto['ID_ESPECIE']; ?>" required>
        <br>
        <label for="id_proveedor">ID Proveedor:</label>
        <input type="number" id="id_proveedor" name="id_proveedor" value="<?php echo $producto['ID_PROVEEDOR']; ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="listar.php">Volver a la lista</a>
</body>
</html>