<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $detallesSeguridad = $_POST["detallesSeguridad"];

    $query = "INSERT INTO seguridadeslaborales (detalleSeguridad) VALUES ('$detallesSeguridad')";
    mysqli_query($conexion, $query);

    header("Location: seguridadLaboral.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Detalle de Seguridad Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Detalle de Seguridad Laboral</h2>
    <form action="agregar_seguridadLaboral.php" method="post">
        <label for="detallesSeguridad">Detalles de Seguridad Laboral:</label>
        <input type="text" id="detallesSeguridad" name="detallesSeguridad" required><br><br>
        <input type="submit" value="Agregar Detalle de Seguridad Laboral">
    </form>
    <a href="seguridadLaboral.php">Volver a Detalles de Seguridad Laboral</a>
</body>
</html>
