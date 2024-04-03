<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreCliente = $_POST["nombreCliente"];
    $apellidoCliente = $_POST["apellidoCliente"];
    $fechaNacimientoCliente = $_POST["fechaNacimientoCliente"];

    $query = "INSERT INTO clientes (cliente, apellidoCliente, fechaNacimientoCliente) 
              VALUES ('$nombreCliente', '$apellidoCliente', '$fechaNacimientoCliente')";
    mysqli_query($conexion, $query);

    header("Location: cliente.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Cliente</h2>
    <form action="agregar_cliente.php" method="post">
        <label for="nombreCliente">Nombre del Cliente:</label>
        <input type="text" id="nombreCliente" name="nombreCliente" required><br><br>
        <label for="apellidoCliente">Apellido del Cliente:</label>
        <input type="text" id="apellidoCliente" name="apellidoCliente" required><br><br>
        <label for="fechaNacimientoCliente">Fecha de Nacimiento del Cliente:</label>
        <input type="date" id="fechaNacimientoCliente" name="fechaNacimientoCliente" required><br><br>
        <input type="submit" value="Agregar Cliente">
    </form>
    <a href="cliente.php">Volver a Lista de Clientes</a>
</body>
</html>
