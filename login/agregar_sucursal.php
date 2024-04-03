<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sucursal = $_POST["sucursal"];
    $ubicacion = $_POST["ubicacion"];
    $tamaño = $_POST["tamaño"];

    $query = "INSERT INTO sucursal (sucursal, ubicacion, tamaño) VALUES ('$sucursal', '$ubicacion', '$tamaño')";
    mysqli_query($conexion, $query);

    header("Location: ingreso.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Sucursal</title>
    <link rel="stylesheet" type="text/css" href="abml\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Sucursal</h2>
    <form action="agregar_sucursal.php" method="post">
        <label for="sucursal">Nombre de la Sucursal:</label>
        <input type="text" id="sucursal" name="sucursal" required><br><br>
        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required><br><br>
        <label for="tamaño">Tamaño:</label>
        <input type="text" id="tamaño" name="tamaño" required><br><br>
        <input type="submit" value="Agregar Sucursal">
    </form>
    <a href="ingreso.php">Volver a Sucursales</a>
</body>
</html>
