<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $material = $_POST["material"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];

    $query = "INSERT INTO materiales (material, descripcion, cantidadInventario) VALUES ('$material', '$descripcion', '$cantidad')";
    mysqli_query($conexion, $query);

    header("Location: material.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Material</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Material</h2>
    <form action="agregar_material.php" method="post">
        <label for="material">Material:</label>
        <input type="text" id="material" name="material" required><br><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required><br><br>
        <label for="cantidad">Cantidad en Inventario:</label>
        <input type="text" id="cantidad" name="cantidad" required><br><br>
        <input type="submit" value="Agregar Material">
    </form>
    <a href="material.php">Volver a Materiales</a>
</body>
</html>
