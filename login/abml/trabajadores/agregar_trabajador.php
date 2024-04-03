<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $correo = $_POST["correo"];

    $query = "INSERT INTO trabajadores (nombre, apellido, fechaNacimiento, correo) VALUES ('$nombre', '$apellido', '$fechaNacimiento', '$correo')";
    mysqli_query($conexion, $query);

    header("Location: sucursal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Trabajador</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Trabajador</h2>
    <form action="agregar_trabajador.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="text" id="fechaNacimiento" name="fechaNacimiento" required><br><br>
        <label for="correo">Correo:</label>
        <input type="text" id="correo" name="correo" required><br><br>
        <input type="submit" value="Agregar Trabajador">
    </form>
    <a href="trabajador.php">Volver a Trabajadores</a>
</body>
</html>
