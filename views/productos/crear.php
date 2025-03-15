<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="../../controllers/ProductoController.php?action=crear" method="POST">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required>
        <br>
        <label for="existencias">Existencias:</label>
        <input type="number" id="existencias" name="existencias" required>
        <br>
        <label for="id_categoria">ID Categoría:</label>
        <input type="number" id="id_categoria" name="id_categoria" required>
        <br>
        <label for="id_especie">ID Especie:</label>
        <input type="number" id="id_especie" name="id_especie" required>
        <br>
        <label for="id_proveedor">ID Proveedor:</label>
        <input type="number" id="id_proveedor" name="id_proveedor" required>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="listar.php">Volver a la lista</a>
</body>
</html>