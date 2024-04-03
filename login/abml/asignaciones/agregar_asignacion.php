<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_vehiculo = $_POST["id_vehiculo"];
    $id_deposito = $_POST["id_deposito"];

    $query = "INSERT INTO asignaciones (id_vehiculo, id_deposito) 
              VALUES ('$id_vehiculo', '$id_deposito')";
    mysqli_query($conexion, $query);

    header("Location: asignaciones.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Asignación</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Asignación</h2>
    <form action="agregar_asignacion.php" method="post">
        <label for="id_vehiculo">Número de Vehículo:</label>
        <input type="text" id="id_vehiculo" name="id_vehiculo" required><br><br>
        <label for="id_deposito">Número de Depósito:</label>
        <input type="text" id="id_deposito" name="id_deposito" required><br><br>
        <input type="submit" value="Agregar Asignación">
    </form>
    <a href="asignacion.php">Volver a Asignaciones de Vehículos</a>
</body>
</html>
