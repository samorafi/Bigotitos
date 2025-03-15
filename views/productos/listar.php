<?php
// views/productos/listar.php

require_once '../../assets/css/styles.css';
?>

<h1>Lista de Productos</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Existencias</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['ID_PRODUCTO']; ?></td>
            <td><?php echo $producto['NOMBRE']; ?></td>
            <td><?php echo $producto['DESCRIPCION']; ?></td>
            <td><?php echo $producto['PRECIO']; ?></td>
            <td><?php echo $producto['EXISTENCIAS']; ?></td>
            <td>
                <a href="index.php?action=editar_producto&id=<?php echo $producto['ID_PRODUCTO']; ?>">Editar</a>
                <a href="index.php?action=eliminar_producto&id=<?php echo $producto['ID_PRODUCTO']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="index.php?action=crear_producto">Crear Nuevo Producto</a>