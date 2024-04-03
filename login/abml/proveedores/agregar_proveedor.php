<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contacto = $_POST["contacto"];
    $producto = $_POST["producto"];
    $precioUnidad = $_POST["precioUnidad"];

    $query = "INSERT INTO proveedores (Contacto, Producto, PrecioUnidad) VALUES ('$contacto', '$producto', '$precioUnidad')";
    mysqli_query($conexion, $query);

    header("Location: proveedor.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Proveedor</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Proveedor</h2>
    <form action="agregar_proveedor.php" method="post">
        <label for="contacto">Contacto:</label>
        <input type="text" id="contacto" name="contacto" required><br><br>
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto" required><br><br>
        <label for="precioUnidad">Precio por Unidad:</label>
        <input type="number" id="precioUnidad" name="precioUnidad" step="0.01" required><br><br>
        <input type="submit" value="Agregar Proveedor">
    </form>
    <a href="proveedor.php">Volver a Proveedores</a>
</body>
</html>
