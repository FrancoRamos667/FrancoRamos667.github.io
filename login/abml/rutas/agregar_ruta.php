<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $distancia = $_POST["distancia"];
    $duracionEstimada = $_POST["duracionEstimada"];

    $query = "INSERT INTO rutas (origen, destino, distancia, duracionEstimada) VALUES ('$origen', '$destino', '$distancia', '$duracionEstimada')";
    mysqli_query($conexion, $query);

    header("Location: ruta.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Ruta</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Ruta</h2>
    <form action="agregar_ruta.php" method="post">
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" required><br><br>
        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" required><br><br>
        <label for="distancia">Distancia:</label>
        <input type="text" id="distancia" name="distancia" required><br><br>
        <label for="duracionEstimada">Duración Estimada:</label>
        <input type="text" id="duracionEstimada" name="duracionEstimada" required><br><br>
        <input type="submit" value="Agregar Ruta">
    </form>
    <a href="ruta.php">Volver a Listado de Rutas</a>
</body>
</html>
