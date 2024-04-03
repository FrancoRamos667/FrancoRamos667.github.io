<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $montoIngreso = $_POST["montoIngreso"];
    $fechaIngreso = $_POST["fechaIngreso"];

    $query = "INSERT INTO ingresos (montoIngreso, fechaIngreso) VALUES ('$montoIngreso', '$fechaIngreso')";
    mysqli_query($conexion, $query);

    header("Location: ingreso.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Ingreso</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Ingreso</h2>
    <form action="agregar_ingreso.php" method="post">
        <label for="montoIngreso">Monto:</label>
        <input type="text" id="montoIngreso" name="montoIngreso" required><br><br>
        <label for="fechaIngreso">Fecha:</label>
        <input type="date" id="fechaIngreso" name="fechaIngreso" required><br><br>
        <input type="submit" value="Agregar Ingreso">
    </form>
    <a href="ingreso.php">Volver a Ingresos</a>
</body>
</html>
