<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Conexion.php";

try {
    $conexion = Conexion::conectar();

    $id_producto = 7;
    $nombre = "Alimento conejo";
    $descripcion = "Alimento para todo tipo de conejo";
    $precio = number_format(15.99, 2, '.', '');
    $existencias = 50;
    $id_categoria = 1;
    $id_especie = 2;
    $id_proveedor = 3;

    $stmt = $conexion->prepare("CALL SP_INSERTAR_PRODUCTO(:id_producto, :nombre, :descripcion, TO_NUMBER(:precio, '9999.99'), :existencias, :id_categoria, :id_especie, :id_proveedor)");

    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
    $stmt->bindParam(':existencias', $existencias, PDO::PARAM_INT);
    $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
    $stmt->bindParam(':id_especie', $id_especie, PDO::PARAM_INT);
    $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);

    $stmt->execute();
    echo "✅ Producto insertado correctamente.";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
