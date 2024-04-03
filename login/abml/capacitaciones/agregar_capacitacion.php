<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $detalleCapacitacion = $_POST["detalleCapacitacion"];

    $query = "INSERT INTO capacitaciones (detalleCapacitacion) VALUES ('$detalleCapacitacion')";
    mysqli_query($conexion, $query);

    header("Location: capacitacion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Capacitación</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Capacitación</h2>
    <form action="agregar_capacitacion.php" method="post">
        <label for="detalleCapacitacion">Detalle de la Capacitación:</label>
        <input type="text" id="detalleCapacitacion" name="detalleCapacitacion" required><br><br>
        <input type="submit" value="Agregar Capacitación">
    </form>
    <a href="capacitacion.php">Volver a Avances de las Obras</a>
</body>
</html>
