<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroEstante = $_POST["numeroEstante"];
    $seccion = $_POST["seccion"];
    $capacidadMaxima = $_POST["capacidadMaxima"];
    $observaciones = $_POST["observaciones"];

    $query = "INSERT INTO almacenes (numeroEstante, seccion, capacidadMaxima, observaciones) 
              VALUES ('$numeroEstante', '$seccion', '$capacidadMaxima', '$observaciones')";
    mysqli_query($conexion, $query);

    header("Location: almacen.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Almacén</title>
    <link rel="stylesheet" type="text/css" href="../\../\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Almacén</h2>
    <form action="agregar_almacen.php" method="post">
        <label for="numeroEstante">Número de Estante:</label>
        <input type="text" id="numeroEstante" name="numeroEstante" required><br><br>
        <label for="seccion">Sección:</label>
        <input type="text" id="seccion" name="seccion" required><br><br>
        <label for="capacidadMaxima">Capacidad Máxima:</label>
        <input type="text" id="capacidadMaxima" name="capacidadMaxima" required><br><br>
        <label for="observaciones">Observaciones:</label>
        <input type="text" id="observaciones" name="observaciones"><br><br>
        <input type="submit" value="Agregar Almacén">
    </form>
    <a href="almacen.php">Volver a Almacenes</a>
</body>
</html>
