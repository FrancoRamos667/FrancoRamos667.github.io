<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mantenimiento = $_POST["mantenimiento"];
    $otrosServicio = $_POST["otrosServicio"];

    $query = "INSERT INTO servicios (mantenimiento, otrosServicio) VALUES ('$mantenimiento', '$otrosServicio')";
    mysqli_query($conexion, $query);

    header("Location: servicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Servicio</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Servicio</h2>
    <form action="agregar_servicio.php" method="post">
        <label for="mantenimiento">Mantenimiento:</label>
        <input type="text" id="mantenimiento" name="mantenimiento" required><br><br>
        <label for="otrosServicio">Otros Servicios:</label>
        <input type="text" id="otrosServicio" name="otrosServicio" required><br><br>
        <input type="submit" value="Agregar Servicio">
    </form>
    <a href="servicio.php">Volver a Servicios</a>
</body>
</html>
